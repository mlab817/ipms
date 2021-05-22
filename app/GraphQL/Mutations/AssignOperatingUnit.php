<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;
use App\Models\OperatingUnit;
use App\User;
use App\Notifications\DatabaseNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class AssignOperatingUnit
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

        Log::debug($user);

        if (!$user) {
            Log::debug('User not found');

            return null;
        } else {
            // function does not work if value is not string
            $roleId = (int) $user->role_id;
            if ($roleId !== 3 && $roleId !== 5) {
                return null;
            } else {
                $user->reviews()->sync($args['operating_units']);
                
                $ous = [];

                $ous = OperatingUnit::whereIn('id', $args['operating_units'])->pluck('acronym')->toArray();

                Log::debug(implode($ous));

                $notification = [
                    'type' => 'AssignedOperatingUnit',
                    'from' => $context->user()->name,
                    'title' => 'Notification',
                    'body' => 'You have been assigned to review '. implode(', ', $ous). '.',
                    'actionText' => 'OK',
                    'actionURL' => '/'
                ];

                $user->notify(new DatabaseNotification($notification));
            }
        }

        return $user;
    }
}
