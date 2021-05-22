<?php

namespace App\GraphQL\Mutations;

use Log;
use App\Models\SubmissionStatus;
use App\Models\PrexcActivity;
use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class FinalizePrexcActivityMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        $prexc_activity = PrexcActivity::find($args['id']);
        $submission_status = SubmissionStatus::where('name','Finalized')->first();

        if (! $prexc_activity) {
          return null;
        }

        $prexc_activity->finalized = true;
        $prexc_activity->finalized_by = $context->user()->id;
        $prexc_activity->finalized_at = Carbon::now();
        $prexc_activity->submission_status_id = $submission_status->id;
        $prexc_activity->save();

        return $prexc_activity;
    }
}
