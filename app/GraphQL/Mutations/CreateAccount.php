<?php

namespace App\GraphQL\Mutations;

use App\User;
use App\Notifications\SendEmailToCreatedUser;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreateAccount
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
        $createdUser = null;
        $status = 'ERROR';
        $message = 'Failed to create account';

        $name = $args['name'];
        $email = $args['email'];
        $password = $args['password'];
        $ou = $args['operating_unit_id'];
        $contact = $args['contact_number'];
        $role = $args['role_id'];
        $notify = isset($args['notify']) ? $args['notify'] : false;

        $user = $context->user();

        if (!$user || $user->role_id != 2) {
            $message = 'Only admins can create a user account';
        } else {
            $existingUser = User::where('email', $email)->first();

            if ($existingUser) {
                $message = 'Email already associated with another user.';
            } else {
                $createdUser = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                    'operating_unit_id' => $ou,
                    'role_id' => $role
                ]);

                if ($createdUser) {
                    $status = 'SUCCESS';
                    $message = 'Successfully created user';

                    // send email to newly created user
                    if ($notify) {
                        $createdUser->notify(new SendEmailToCreatedUser($password));    
                    }
                } else {
                    $message = 'Something went wrong.';
                }
            }
        }

        return [
            'user' => $createdUser,
            'status' => $status,
            'message' => $message
        ];
    }
}
