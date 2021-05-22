<?php

namespace App\GraphQL\Mutations;

use App\Models\ProcessingStatus;
use App\Models\ProjectProcessingStatus;
use App\Models\Project;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class SubmitReview
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
        // TODO implement the resolver
        // retrieve project
        $status = 'FAILED';
        $message = 'An error occurred.';

        $project = Project::find($args['id']);

        if (!$project) {
            $project = null;
        } else {
            $review = $project->review()->first();

            if (!$review) {
                $message = 'Review not found.';
            } else {
                $processing_status = ProcessingStatus::where('name','reviewed')->first();

                // mark project as reviewed
                $project->reviewed = true;
                $project->processing_status_id = $processing_status->id;
                $project->processed_by = $context->user()->id;
                $project->save();

                // TODO: implement notify lead

                ProjectProcessingStatus::create([
                    'project_id' => $project->id,
                    'processing_status_id' => $processing_status->id,
                    'processed_by' => $context->user()->id,
                    'remarks' => $args['remarks'],
                    'processed_at' => Carbon::now()
                ]);

                $message = 'Successfully submitted review';
                $status = 'SUCCESS';
            }
        }

        return [
            'project' => $project,
            'message' => $message,
            'status' => $status
        ];
    }
}
