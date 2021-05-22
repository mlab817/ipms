<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class DeleteProject
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
        $project = Project::find($args['id']);

        $status = 'FAILED';
        $message = 'An error occurred';

        if (! $project) {

            $deletedProject = [];

            $message = 'Project not found';

        } else {

            $user = $context->user();

            $deletedProject = $project->toArray();

            $project->deleted_by = $user->id;
            $project->save();

            $project->delete();

            $status = 'SUCCESS';
            $message = 'Project successfully deleted';

            activity()
                ->performedOn($project)
                ->causedBy($user)
                ->withProperties(['action' => 'deleted'])
                ->log('Project was deleted');
        }

        return [
            'project' => $deletedProject,
            'status' => $status,
            'message' => $message
        ];
    }
}
