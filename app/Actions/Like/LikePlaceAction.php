<?php

namespace Hedonist\Actions\Like;

use Hedonist\Entities\Like\Like;
use Hedonist\Entities\Place\Place;
use Hedonist\Events\Like\LikeAddEvent;
use Hedonist\Exceptions\Place\PlaceNotFoundException;
use Hedonist\Repositories\Like\LikeRepository;
use Hedonist\Repositories\Dislike\DislikeRepository;
use Hedonist\Repositories\Place\PlaceRepository;
use Illuminate\Support\Facades\Auth;
use Hedonist\Entities\Like\LikeStatus;

class LikePlaceAction
{
    private $likeRepository;
    private $dislikeRepository;
    private $placeRepository;

    public function __construct(
        LikeRepository $likeRepository,
        DislikeRepository $dislikeRepository,
        PlaceRepository $placeRepository
    ) {
        $this->likeRepository = $likeRepository;
        $this->dislikeRepository = $dislikeRepository;
        $this->placeRepository = $placeRepository;
    }

    public function execute(LikePlaceRequest $request): LikePlaceResponse
    {
        $place = $this->placeRepository->getById($request->getPlaceId());
        if ($place === null) {
            throw new PlaceNotFoundException();
        }

        $like = $this->likeRepository->findByUserAndPlace(Auth::id(), $request->getPlaceId());
        if ($like === null) {
            $like = new Like([
                'likeable_id' => $request->getPlaceId(),
                'likeable_type' => Place::class,
                'user_id' => Auth::id()
            ]);
            $this->likeRepository->save($like);
            event(new LikeAddEvent($like));
        } else {
            $this->likeRepository->deleteById($like->id);
        }

        $place = $this->placeRepository->getByIdWithRelations($request->getPlaceId());
        if (!$place) {
            throw new PlaceNotFoundException;
        }

        $liked = LikeStatus::none();
        $userId = Auth::id();
        $like = $this->likeRepository->findByUserAndPlace($userId, $request->getPlaceId());
        if ($like) {
            $liked = LikeStatus::liked();
        } else {
            $dislike = $this->dislikeRepository->findByUserAndPlace($userId, $request->getPlaceId());
            if ($dislike) {
                $liked = LikeStatus::disliked();
            }
        }
        
        return new LikePlaceResponse(
            $place->likes->count(),
            $place->dislikes->count(),
            $liked->value()
        );
    }
}
