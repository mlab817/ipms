<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Joselfonseca\LighthouseGraphQLPassport\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginEvent
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
    public function handle(UserLoggedIn $event)
    {
        $event->user->setLoginLog();
    }
}
