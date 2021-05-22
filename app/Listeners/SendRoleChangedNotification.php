<?php

namespace App\Listeners;

use App\Events\RoleChanged;
use App\Notifications\RoleChangedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendRoleChangedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RoleChanged  $event
     * @return void
     */
    public function handle(RoleChanged $event)
    {
        // $event here is the response returned by the function
        $user = $event->array['user'];

        // Retrieve new role
        $role = $user->role->name;

        // Customizing the message
        $message = 'You have been assigned a new role: '.$role;

        Notification::send($user, new RoleChangedNotification($message));
    }
}
