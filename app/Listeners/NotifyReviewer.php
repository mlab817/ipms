<?php

namespace App\Listeners;

use App\Models\OperatingUnit;
use App\Notifications\ProjectEndorsedNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;

class NotifyReviewer
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
    public function handle($event)
    {
        $project = $event->project;
        $ou = $project->operating_unit_id;

        $reviewers = OperatingUnit::find($ou)->reviewers;

        $data = [
            'type' => 'ProjectEndorsed',
            'from' => 'System',
            'title' => 'Project Endorsed',
            'body' => 'A project has been endorsed.',
            'actionText' => 'View',
            'actionURL' => config('FRONTEND_URL') . '/' . $project->id
        ];

        if ($reviewers) {
            Notification::send($reviewers, new ProjectEndorsedNotification($data));
        }
    }
}
