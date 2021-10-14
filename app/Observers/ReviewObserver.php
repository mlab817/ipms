<?php

namespace App\Observers;

use App\Models\ProjectReview;

class ReviewObserver
{
    public function creating(ProjectReview $review)
    {
        $review->user()->associate(auth()->user());
    }

    /**
     * Handle the ProjectReview "created" event.
     *
     * @param  \App\Models\ProjectReview  $review
     * @return void
     */
    public function created(ProjectReview $review)
    {
        //
    }

    public function updating(ProjectReview $review)
    {
        if (is_null($review->user_id)) {
            $review->user_id = auth()->id();
        }
    }

    /**
     * Handle the ProjectReview "updated" event.
     *
     * @param  \App\Models\ProjectReview  $review
     * @return void
     */
    public function updated(ProjectReview $review)
    {
        //
    }

    /**
     * Handle the ProjectReview "deleted" event.
     *
     * @param  \App\Models\ProjectReview  $review
     * @return void
     */
    public function deleted(ProjectReview $review)
    {
        //
    }

    /**
     * Handle the ProjectReview "restored" event.
     *
     * @param  \App\Models\ProjectReview  $review
     * @return void
     */
    public function restored(ProjectReview $review)
    {
        //
    }

    /**
     * Handle the ProjectReview "force deleted" event.
     *
     * @param  \App\Models\ProjectReview  $review
     * @return void
     */
    public function forceDeleted(ProjectReview $review)
    {
        //
    }
}
