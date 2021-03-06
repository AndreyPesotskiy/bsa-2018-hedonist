<?php

namespace Hedonist\Actions\User\Notifications;

use Illuminate\Notifications\DatabaseNotification;

class GetNotificationsPresenter
{
    public function presentCollection(GetNotificationsResponse $response): array
    {
        return $response->getNotificationCollection()->map(
            function (DatabaseNotification $notification) {
                return [
                    'id' => $notification->id,
                    'data' => $notification->data,
                    'read_at' => $notification->read_at,
                    'created_at' => $notification->created_at
                ];
            })->toArray();
    }
}