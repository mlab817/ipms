<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReviewPrexcActivitiesMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        $prexc_activity = PrexcActivity::find($args['id']);

        if (! $prexc_activity) {
          return null;
        }

        $prexc_activity->reviewed = true;
        $prexc_activity->reviewed_by = $context->user()->id;
        $prexc_activity->reviewed_at = Carbon::now();
        $prexc_activity->save();

        return $prexc_activity;
    }
}
