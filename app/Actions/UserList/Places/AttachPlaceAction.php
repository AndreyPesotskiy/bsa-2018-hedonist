<?php

namespace Hedonist\Actions\UserList\Places;

use Hedonist\Exceptions\Place\PlaceNotFoundException;
use Hedonist\Exceptions\UserList\UserListNotFoundException;
use Hedonist\Exceptions\NonAuthorizedException;
use Hedonist\Exceptions\UserList\UserListPermissionDeniedException;
use Hedonist\Repositories\UserList\UserListRepositoryInterface;
use Hedonist\Repositories\Place\PlaceRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AttachPlaceAction
{
    private $userListRepository;
    private $placeRepository;

    public function __construct(
        UserListRepositoryInterface $userListRepository,
        PlaceRepositoryInterface $placeRepository
    ) {
        $this->userListRepository = $userListRepository;
        $this->placeRepository = $placeRepository;
    }

    public function execute(AttachPlaceRequest $request): AttachPlaceResponse
    {
        $userList = $this->userListRepository->getById($request->getUserListId());
        if (!$userList) {
            throw new UserListNotFoundException();
        }
        if (Gate::denies('userList.attachPlace', $userList)) {
            throw new UserListPermissionDeniedException();
        }
        $place = $this->placeRepository->getById($request->getPlaceId());
        if (!$place) {
            throw new PlaceNotFoundException();
        }
        $userlistPlace = $this->placeRepository
            ->getByList($request->getUserListId())
            ->find($place->id);
        if (empty($userlistPlace)) {
            $this->userListRepository->attachPlace($userList, $place);
        }
        return new AttachPlaceResponse();
    }
}
