<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdatePipolStatus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        $user = $context->user();

        if (! $user) {
        	return null;
        }

        $project = Project::find($args['id']);

        if (! $project) {
        	return null;
        }

        $project->pipol_status_id = $args['pipol_status_id'];
        $project->save();

        return $project;
    }
}
