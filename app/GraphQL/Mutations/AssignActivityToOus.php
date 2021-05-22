<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;

class AssignActivityToOus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $activity = PrexcActivity::find($args['id']);

        if (! $activity) {
          // there is no such activity
          return null;
        }

        // empty is also ok
        $activity->operating_units()->sync($args['operating_units']);

        return $activity;
    }
}
