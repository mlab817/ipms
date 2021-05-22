<?php

namespace App\GraphQL\Subscriptions;

use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // this is just for logging
use Nuwave\Lighthouse\Schema\Types\GraphQLSubscription;
use Nuwave\Lighthouse\Subscriptions\Subscriber;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class TransferredProject extends GraphQLSubscription
{
    /**
     * Check if subscriber is allowed to listen to the subscription.
     *
     * @param  \Nuwave\Lighthouse\Subscriptions\Subscriber  $subscriber
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public function authorize(Subscriber $subscriber, Request $request): bool
    {
        return !!$subscriber->context->user;
    }

    /**
     * Filter which subscribers should receive the subscription.
     *
     * @param  \Nuwave\Lighthouse\Subscriptions\Subscriber  $subscriber
     * @param  mixed  $root
     * @return bool
     */
    public function filter(Subscriber $subscriber, $root): bool
    {

        // $root does not have a project
        $args = $subscriber->args; // note that args is an array

        // $args is an array here, and so is $root since the argument returned by the mutation is array return[]
        return $root['project']['created_by'] == $args['user_id'];
    }


    public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // return the project which is part of the response to this mutation
        return $root['project']; // this is already being returned, nice
    }
}
