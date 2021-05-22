<?php

namespace App\GraphQL\Mutations;

use Log;
use App\Notifications\SendEmailRequestAccountNotification;
use App\Models\OperatingUnit;
use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\Notification;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class RequestAccount
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
        // TODO implement the resolver
        $status = 'FAILED';
        $message = 'Failed to send request.';

        $users = User::where('role_id',2)->get();

        $ou = OperatingUnit::where('id',$args['operating_unit'])->first();

        if ($users) {
            Log::debug($users);

            $action = env('ADMIN_URL')
                . '?email='. $args['email']
                . '&name='. urlencode($args['name'])
                . '&operating_unit='. $args['operating_unit']
                . '&contact_number='. urlencode($args['contact_number']);

            Log::debug($action);

            $data = [
                'name' => $args['name'],
                'email' => $args['email'],
                'operating_unit' => $ou->name,
                'contact_number' => $args['contact_number'],
                'message' => $args['message'],
                'action' => $action
            ];

            Notification::send($users, new SendEmailRequestAccountNotification($data));

            $status = 'SUCCESS';
            $message = 'Successfully sent request.';
        }

        return [
            'status' => $status,
            'message' => $message
        ];
    }
}
