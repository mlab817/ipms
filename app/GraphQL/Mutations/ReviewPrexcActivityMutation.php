<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ReviewPrexcActivityMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        $ids = $args['id'];
        $userId = $context->user()->id;
        $now = Carbon::now();

        $prexc_activities = PrexcActivity::whereIn('id', $ids)->update([
          'reviewed' => true,
          'reviewed_by' => $userId,
          'reviewed_at' => $now
        ]);

        return PrexcActivity::whereIn('id', $ids)->get();
    }
}
