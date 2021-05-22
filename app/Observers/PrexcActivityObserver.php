<?php

namespace App\Observers;

use App\Models\PrexcActivity;

class PrexcActivityObserver
{
    /**
     * Handle the prexc activity "created" event.
     *
     * @param  \App\Models\PrexcActivity  $prexcActivity
     * @return void
     */
    public function created(PrexcActivity $prexcActivity)
    {
        //
    }

    /**
     * Handle the prexc activity "updated" event.
     *
     * @param  \App\Models\PrexcActivity  $prexcActivity
     * @return void
     */
    public function updated(PrexcActivity $prexcActivity)
    {
        //
    }

    /**
     * Handle the prexc activity "deleted" event.
     *
     * @param  \App\Models\PrexcActivity  $prexcActivity
     * @return void
     */
    public function deleted(PrexcActivity $prexcActivity)
    {
        //
    }

    /**
     * Handle the prexc activity "restored" event.
     *
     * @param  \App\Models\PrexcActivity  $prexcActivity
     * @return void
     */
    public function restored(PrexcActivity $prexcActivity)
    {
        //
    }

    /**
     * Handle the prexc activity "force deleted" event.
     *
     * @param  \App\Models\PrexcActivity  $prexcActivity
     * @return void
     */
    public function forceDeleted(PrexcActivity $prexcActivity)
    {
        //
    }
}
