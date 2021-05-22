<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcSubprogram;

class AssignSubprogramToOus
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $subprogram = PrexcSubprogram::find($args['id']);

        if (! $subprogram) {
          // there is no such activity
          return null;
        }

        // empty is also ok
        $subprogram->operating_units()->sync($args['operating_units']);

        return $subprogram;
    }
}
