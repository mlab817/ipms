<?php

namespace App\GraphQL\Mutations;

use App\Models\Role;
use App\User;
use App\Notifications\DatabaseNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AssignRole
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = User::find($args['user_id']);

        if (!$user) {
          return null;
        } else {
          if (!$args['role_id']) {
            $user->role()->dissociate();
            $user->save();

            return [
              'user' => $user,
              'status' => 'SUCCESS',
              'message' => 'Successfully removed role.'
            ];
          } else {
            $role = Role::findOrFail($args['role_id']);

            $user->role()->associate($role);

            // if role is no longer reviewer or viewer, remove all OUs
            if ($args['role_id'] !== 3 &&  $args['role_id'] !== 5)
            {
              $user->reviews()->sync([]);
            }

            $user->save();

            $notificationData = [
              'type' => 'assignRole',
              'from' => $context->user()->email,
              'title' => 'Assigned Role',
              'body' => 'You were assigned a new role: '. $role->name,
              'actionText' => 'OK',
              'actionURL' => '/dashboard'
            ];

            $user->notify(new DatabaseNotification($notificationData));

            return $user;
          }
        }
    }
}
