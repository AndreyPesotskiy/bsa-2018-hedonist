<?php

namespace Hedonist\Actions\Presenters\User;

use Illuminate\Foundation\Auth\User;

class UserPresenter
{
    private $userInfoPresenter;

    public function __construct(UserInfoPresenter $presenter)
    {
        $this->userInfoPresenter = $presenter;
    }

    public function present(User $user): array
    {
        $userData = [
            'id' => $user->id,
            'email' => $user->email,
        ];
        $userInfo = $user->info ? $this->userInfoPresenter->present($user->info) : [];

        return array_merge($userData, $userInfo);
    }
}