<?php

namespace App\GraphQL\Subscriptions;

use App\Events\ProjectCreatedEvent;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Http\Request;
use Nuwave\Lighthouse\Schema\Types\GraphQLSubscription;
use Nuwave\Lighthouse\Subscriptions\Subscriber;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;


class ProjectCreated extends GraphQLSubscription
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
        // TODO implement authorize
        // $user = $subscriber->context->user;
        // $created_by = User::find($subscriber->args['created_by']);

        // return $user->can('view', $created_by);
        // $user = $subscriber->context->user;
        // $project = Project::find($subscriber->args['id']);

        // // return $user->can('viewProjects', $project);
        // return $project;
        return true;
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
        // TODO implement filter
        // $user = $subscriber->context->user;
        // $user = $subscriber->context->user;

        // return $root->updated_by !== $user->id;
        // return true;
        // return $root->created_by !== $user->id;
        return true;
    }

    public function resolve($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return $root;
    }

}
