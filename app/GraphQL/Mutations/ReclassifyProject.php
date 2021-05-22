<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReclassifyProject
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
	    $project = Project::find($args['id']);
	    $user = $context->user();

	    if (! $project) {
	    	return null;
	    }

	    $project->banner_program_id = isset($args['banner_program_id']) ? $args['banner_program_id'] : null;
	    $project->updated_by = $user->id;
	    $project->save();

	    return $project;
    }
}
