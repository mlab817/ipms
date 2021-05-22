<?php

namespace App\GraphQL\Mutations;

use App\Models\Share;
use App\Models\Project;
use App\Notifications\ShareProjectNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class ShareProjectMutation
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

        $user = $context->user->name;

        $project = Project::withoutGlobalScopes()->find($args['project_id']);

        if (!$project) {
          return null;
        }

        $message = $user . ' has shared the project entitled ' . $project->title .' with you. Click the link below to view it.';

        $token = Str::random(60);

        $url = env('FRONT_URL') . '/shared/'. $project->id . '?token=' . $token;

        $data = [
          'message' => $message,
          'url' => $url
        ];

        Notification::route('mail', $args['email'])
          ->notify(new ShareProjectNotification($data));

        Share::create([
          'project_id' => $project->id,
          'token' => $token,
          'email' => $args['email'],
          'shared_by' => $context->user->id
        ]);

        return [
          'message' => 'Success',
          'status' => 'SUCCESS'
        ];
    }
}
