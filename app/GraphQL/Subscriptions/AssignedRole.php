<?php

namespace App\GraphQL\Subscriptions;

use Illuminate\Http\Request;
use Nuwave\Lighthouse\Schema\Types\GraphQLSubscription;
use Nuwave\Lighthouse\Subscriptions\Subscriber;

class AssignedRole extends GraphQLSubscription
{
    /**
     * Check if subscriber is allowed to listen to the subscription.
     *
     * @param Subscriber $subscriber
     * @param Request $request
     * @return bool
     */
    public function authorize(Subscriber $subscriber, Request $request): bool
    {
        // check if user is not null
        // if not authorize them
        // this refers to subscriber, the one listening
        return (bool) $subscriber->context->user;
    }

    /**
     * Filter which subscribers should receive the subscription.
     *
     * @param Subscriber $subscriber
     * @param  mixed  $root
     * @return bool
     */
    public function filter(Subscriber $subscriber, $root): bool
    {
        // $root refers to what the mutation is returning, in this case, it refers to response of assignedRole
        // $root basically returns the user whose role got changed
        // returning true would mean that the subscriber will receive the subscription, false otherwise
        // $root->id should return the userId whose role has changed, therefore, the id of the subscriber should match this
        return $root->id == $subscriber->context->user->id;
    }
}
