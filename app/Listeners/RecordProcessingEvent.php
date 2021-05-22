<?php

namespace App\Listeners;

use Log;
use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use App\Events\ProjectProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordProcessingEvent
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
     * @param  ProjectProcessed  $event
     * @return void
     */
    public function handle(ProjectProcessed $event)
    {
        $project = $event->project;

        $processing_status = ProcessingStatus::find($project->processing_status_id);

        // Log::info(json_encode($event));

        $processing_status_name = $processing_status->name ?? '_';

        ProjectProcessingStatus::create([
            'project_id' => $project->id,
            'processing_status_id' => $project->processing_status_id,
            'processed_by' => $event->user->id,
            'remarks' => 'Project '. $processing_status_name
        ]);
    }
}
