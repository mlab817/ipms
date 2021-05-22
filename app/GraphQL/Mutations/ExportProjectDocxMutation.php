<?php

namespace App\GraphQL\Mutations;

class ExportProjectDocxMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $link = null;

        return [
          'link' => $link
        ];
    }
}
