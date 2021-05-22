<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ProcessProjectMutation
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
        $user = $context->user()->id;

        if (!$user) {
            return null;
        }

        $project = Project::find($args['project_id']);

        if (!$project) {
            return null;
        }

        $project->project_processing_statuses()->create([
            'processing_status_id' => $args['processing_status_id'],
            'remarks' => $args['remarks'],
            'processed_by' => $user
        ]);
        // TODO implement the resolver

        $project->processing_status_id = $args['processing_status_id'];
        $project->save();

        return $project;
    }
}
