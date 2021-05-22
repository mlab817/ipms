<?php

namespace App\GraphQL\Mutations;

use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use App\Models\Project;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RevertToDraftProject
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user = $context->user();

        $project = Project::find($args['id']);

        if (! $project) {
          return null;
        }

        $processing_status = ProcessingStatus::where('name','created')->first();

        $project->processed_by = $user->id;
        $project->finalized = false;
        $project->endorsed = false;
        $project->validated = false;
        $project->signed_copy = null;
        $project->submission_status_id = 1;
        $project->processing_status_id = 1;
        $project->save();

        // add to process project data
        ProjectProcessingStatus::create([
            'project_id' => $project->id,
            'processing_status_id' => $processing_status->id,
            'processed_by' => $user->id,
            'remarks' => $args['remarks'] ?? 'Revert to Draft'
        ]);

        return $project;
    }
}
