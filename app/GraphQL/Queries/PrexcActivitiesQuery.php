<?php

namespace App\GraphQL\Queries;

use App\Models\PrexcActivity;

class PrexcActivitiesQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $prexc_activities = [];

        $user = auth()->user();

        if ($user->role && $user->role->name === 'encoder') {
          $ou = $user->operating_unit_id;

          $prexc_activities = PrexcActivity::where('operating_unit_id', $ou)->get();
        } else {
          $prexc_activities = PrexcActivity::all();
        }

        return $prexc_activities;
    }
}
