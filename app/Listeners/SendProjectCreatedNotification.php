<?php

namespace App\Listeners;

use App\Notifications\ProjectCreated;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Events\ProjectCreatedEvent;
use Exception;

class SendProjectCreatedNotification
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
     * @param  \App\Events\ProjectCreated  $event
     * @return void
     */
    public function handle(ProjectCreatedEvent $event)
    {
        // Access the order using $event->order...
        $user = User::where('id',$event->project['created_by'])->first();

        // throw new Exception($followers);
        // throw new Exception(json_encode($user->followers));

        $project = $event->project->toArray();

        // throw new Exception($event->project);

        Notification::send($user, new ProjectCreated($project));
    }
}