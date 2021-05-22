<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\PrexcActivity;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UndoFinalizePrexcActivity
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args, GraphQLContext $context)
    {
      $prexc_activity = PrexcActivity::find($args['id']);
      $user = $context->user();

      if (!$prexc_activity) {
        throw new CustomException(
          'Item not found',
          'You may not have access to this item or the item has been deleted.'
        );
      }

      if ($user->role->name !== 'reviewer') {
        throw new CustomException(
          'You have no access to this feature.',
          'Only reviewers can access this feature.'
        );
      }

      $prexc_activity->finalized = false;
      $prexc_activity->submission_status_id = 1;
      $prexc_activity->save();

      return $prexc_activity;
    }
}
