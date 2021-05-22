<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\User;
use App\Notifications\DatabaseNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class TransferProject
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed['user_id','project_id']  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        // Check first if user can transfer the project, they should be the current owner
        $project = Project::find($args['project_id']);
        $status = 'FAILED';
        $message = 'Something went wrong';

        $userId = $context->user()->id;

        // check if project exist
        if (!$project) {
            $project = null;
            $status = 'FAILED';
            $message = 'Project not found.';
        } else {
            // check if project is owned by user
            if ($project->created_by != $userId) {
                $message = 'User not owner of project.';
            } else {
                $receivingUser = User::find($args['user_id']);

                // check if receiving user is existing and its role is encoder
                if (!$receivingUser || $receivingUser->role->name != 'encoder') {
                    $project = null;
                    $status = 'FAILED';
                    $message = 'User not found or not an encoder.';
                } else {
                    // change owner
                    $project->created_by = $receivingUser->id;
                    $project->save();

                    $notification = [
                        'type' => 'TransferProject',
                        'from' => $context->user()->name,
                        'title' => 'Transfer Project',
                        'body' => 'You are now the owner of project entitled ' . $project->title,
                        'actionText' => 'View',
                        'actionURL' => '/projects/' . $project->id
                    ];

                    $receivingUser->notify(new DatabaseNotification($notification));

                    // return status and message
                    $status = 'SUCCESS';
                    $message = 'Successfully transferred project.';
                }
            }
        }

        return [
            'project'   => $project,
            'status'    => $status,
            'message'   => $message
        ];
    }
}
