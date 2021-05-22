<?php

namespace App\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Notifications\DatabaseNotification;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class NotificationMutator
{
    public function markAsRead($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $notification = DatabaseNotification::find($args['id']);

        $status = '';

        if (!$notification) {
            $status = 'FAILED';
        } else {
            $notification->markAsRead();

            $status = 'SUCCESS';
        }

        return $notification;

    }

    public function markAllAsRead($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = $context->user();

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return [
            'status' => 'SUCCESS'
        ];
    }
}
