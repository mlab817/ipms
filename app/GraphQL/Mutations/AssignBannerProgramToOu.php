<?php

namespace App\GraphQL\Mutations;

use App\Models\OperatingUnit;

class AssignBannerProgramToOu
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $operating_unit = OperatingUnit::find($args['operating_unit_id']);

        if (! $operating_unit) {
          return null;
        }

        $operating_unit->consolidates()->sync($args['banner_programs']);

        return $operating_unit;
    }
}
