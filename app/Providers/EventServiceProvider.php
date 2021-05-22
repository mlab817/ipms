<?php

namespace App\Providers;

use App\Events\ProjectEndorsedEvent;
use App\Events\ProjectFinalized;
use App\Events\ProjectProcessed;
use App\Events\ProjectUpdated;
use App\Events\ProjectCreatedEvent;
use App\Events\RoleChanged;
use App\Events\SignedCopyUploaded;
use App\Listeners\AssignDefaultRole;
use App\Listeners\LogLoginEvent;
use App\Listeners\NotifyReviewer;
use App\Listeners\SendRoleChangedNotification;
use App\Listeners\RecordProcessingEvent;
use App\Listeners\ProjectEndorsedListener;
use App\Listeners\ProjectUpdated as ProjectUpdatedListener;
use App\Listeners\SendCompleteUserProfileNotification;
use App\Listeners\SendProjectCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Joselfonseca\LighthouseGraphQLPassport\Events\UserLoggedIn;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserLoggedIn::class => [
            LogLoginEvent::class
        ],
        Registered::class => [
            // CreateUserAvatar::class,
            AssignDefaultRole::class,
            SendCompleteUserProfileNotification::class
        ],
        ProjectCreatedEvent::class => [
          SendProjectCreatedNotification::class
        ],
        RoleChanged::class => [
            SendRoleChangedNotification::class
        ],
        ProjectProcessed::class => [
            RecordProcessingEvent::class
        ],
        ProjectUpdated::class => [
            ProjectUpdatedListener::class
        ],
        ProjectFinalized::class => [
            \App\Listeners\ProjectFinalized::class
        ],
        SignedCopyUploaded::class => [
            NotifyReviewer::class
        ],
        ProjectEndorsedEvent::class => [
            NotifyReviewer::class,
            ProjectEndorsedListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
