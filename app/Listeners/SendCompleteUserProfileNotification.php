<?php

namespace App\Listeners;

use App\User;
use App\Notifications\DatabaseNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCompleteUserProfileNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = User::where('email',$event->user->email)->first();

        $notification = [
            'type' => 'CompleteProfile',
            'from' => 'System',
            'title' => 'Welcome',
            'body' => 'Please complete your profile.',
            'actionText' => 'Complete Profile',
            'actionURL' => '/account'
        ];

        $user->notify(new DatabaseNotification($notification));
    }
}
