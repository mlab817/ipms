<?php

namespace App\GraphQL\Queries;

use App\Models\PrexcActivity;
use Illuminate\Database\Eloquent\Collection;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ConsolidatedActivitiesQuery
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context): Collection
    {
        $prexc_activities = null;

        $link = null;
        $user = $context->user();

        $ou = $user->operating_unit;
        $conso = $ou->consolidates;

        if (!empty($conso)) {
           $prexc_activities = PrexcActivity::with(['operating_unit','prexc_program','prexc_subprogram','banner_program'])
              ->withoutGlobalScopes()
              ->whereIn('banner_program_id',$conso->pluck('id'))
              ->get();
        }

        return $prexc_activities;
    }
}
