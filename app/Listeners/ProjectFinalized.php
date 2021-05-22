<?php

namespace App\Listeners;

use App\Models\SubmissionStatus;
use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProjectFinalized
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

        $processing_status = ProcessingStatus::where('name','finalized')->first();
        $ss = SubmissionStatus::where('name','finalized')->first();

        $project->submission_status_id = $ss->id;
        $project->save();

        ProjectProcessingStatus::create([
            'project_id' => $project->id,
            'processing_status_id' => $processing_status->id,
            'processed_by' => $event->user->id,
            'remarks' => 'Project '. $processing_status->name
        ]);
    }
}
