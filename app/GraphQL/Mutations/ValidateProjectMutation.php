<?php

namespace App\GraphQL\Mutations;

use App\Models\SubmissionStatus;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ValidateProjectMutation
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
        // Check if the user is a reviewer
        $user = $context->user();

        // if user is not reviewer
        if ($user->role->name !== 'reviewer') {
            return null;
        } else {
            $project = Project::find($args['id']);

            if (!$project) {
                return null;
            } else {
                $validation_data = $args['validation_data'] ?? false;
                $validation_signed = $args['validation_signed'] ?? false;

                $processing_status = ProcessingStatus::where('name','validated')->first();
                $processing_status_id = $processing_status->id;

                // if validation data is false, encoder must be able to update data
                $project->validation_data = $validation_data;

                // if the signed copy is not present or invalid, user should change signed validation
                $project->validation_signed = $validation_signed;

                // mark project as validated
                $project->validated = true;
                // change status to validated
                $ss = SubmissionStatus::where('name','Validated')->first();
                $project->submission_status_id = $ss->id;

                $project->processed_by = $user->id;
                $project->save();

                ProjectProcessingStatus::create([
                    'project_id' => $project->id,
                    'processing_status_id' => $processing_status->id,
                    'processed_by' => $user->id,
                    'remarks' => $args['remarks'] ?? 'Validated'
                ]);

                return $project;
            }
        }
    }
}
