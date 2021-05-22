<?php

namespace App\GraphQL\Mutations;

use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FinalizeProjectMutation
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // this function will lock the project from further editing
        $user = $context->user();

        $project = Project::find($args['id']);

        if (!$project) {
            return null;    
        } else {
            $processing_status = ProcessingStatus::where('name','updated')->first();

            $project->finalized = true;
            $project->processed_by = $context->user()->id;
            $project->save();

            // set it to updated
            ProjectProcessingStatus::create([
                'project_id' => $project->id,
                'processing_status_id' => $processing_status->id,
                'processed_by' => $user->id,
                'remarks' => $args['remarks'] ?? 'Locked'
            ]);

            return $project;
        }
    }

}
