<?php

namespace App\GraphQL\Mutations;

use App\User;
use App\Models\ProcessingStatus;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use App\Notifications\DatabaseNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReturnProjectMutation
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
        // return a project to the user and make it editable
        // Let's check if the user is a reviewer
        $user = $context->user();

        if ($user->role->name !== 'reviewer') {
            return null;
        } else {
            $project = Project::find($args['project_id']);

            if (!$project) {
                return null;
            } else {
                $processing_status = ProcessingStatus::where('name','returned')->first();

                $project->finalized = false;
                $project->processing_status_id = $processing_status->id;
                $project->processed_by = $user->id;
                $project->save();

                // ProjectProcessingStatus::create([
                //     'project_id' => $project->id,
                //     'processing_status_id' => $processing_status->id,
                //     'processed_by' => $user->id,
                //     'remarks' => $args['remarks']
                // ]);

                activity()
                    ->performedOn($project)
                    ->causedBy($user)
                    ->withProperties(['status' => 'returned'])
                    ->log('Project returned');

                $owner = User::find($project->created_by);

                $owner->notify(new DatabaseNotification(
                    [
                        'type' => 'Returned Project',
                        'from' => $user->name,
                        'title' => 'Project returned',
                        'body' => $user->name . ' returned ' . $project->title . '.',
                        'actionText' => '',
                        'actionURL' => ''
                    ]
                ));

                return $project;
            }
        }
    }
}
