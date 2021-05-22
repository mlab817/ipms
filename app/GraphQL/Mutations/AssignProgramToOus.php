<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcProgram;

class AssignProgramToOus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $program = PrexcProgram::find($args['id']);

        if (! $program) {
          // there is no such activity
          return null;
        }

        // empty is also ok
        $program->operating_units()->sync($args['operating_units']);

        return $program;
    }
}
