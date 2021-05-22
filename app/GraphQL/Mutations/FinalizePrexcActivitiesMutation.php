<?php

namespace App\GraphQL\Mutations;

use App\Models\SubmissionStatus;
use App\Models\PrexcActivity;
use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FinalizePrexcActivitiesMutation
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

        $submission_status = SubmissionStatus::where('name','Finalized')->first();

        $prexc_activities = PrexcActivity::whereIn('id', $ids)->update([
          'finalized' => true,
          'finalized_by' => $userId,
          'finalized_at' => $now,
          'submission_status_id' => $submission_status->id // Finalized
        ]);

        return PrexcActivity::whereIn('id', $ids)->get();
    }
}
