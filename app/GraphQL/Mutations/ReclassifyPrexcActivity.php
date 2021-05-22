<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReclassifyPrexcActivity
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
	    $pa = PrexcActivity::find($args['id']);
	    $user = $context->user();

	    if (! $pa) {
		    return null;
	    }

	    $pa->banner_program_id = isset($args['banner_program_id']) ? $args['banner_program_id'] :  null;
	    $pa->updated_by = $user->id;
	    $pa->save();

	    return $pa;
    }
}
