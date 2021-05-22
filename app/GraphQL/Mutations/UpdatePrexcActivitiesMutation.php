<?php

namespace App\GraphQL\Mutations;

use App\Models\PrexcActivity;
use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdatePrexcActivitiesMutation
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
        // TODO implement the resolver
        // info(json_encode($args['input']));
        $sucess = [];
        $errors = [];

        $inputs = $args['input'];

        foreach ($inputs as $input) {
          $prexc_activity = PrexcActivity::find($input['id']);
        }

        return [
          'success' => $success,
          'errors' => $errors
        ];
    }
}
