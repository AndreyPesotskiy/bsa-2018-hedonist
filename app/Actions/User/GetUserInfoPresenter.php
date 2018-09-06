<?php

namespace Hedonist\Actions\User;

use Hedonist\Actions\Presenters\User\UserPresenter;

class GetUserInfoPresenter
{
    private $userPresenter;

    public function __construct(UserPresenter $presenter)
    {
        $this->userPresenter = $presenter;
    }

    public function present(GetUserInfoResponse $response)
    {
        $result = $this->userPresenter->present($response->getUser());
        $result['followers'] = $this->userPresenter->presentCollection($response->getFollowers());
        $result['followedUsers'] = $this->userPresenter->presentCollection($response->getFollowed());

        return $result;
    }
}