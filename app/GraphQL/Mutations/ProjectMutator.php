<?php

namespace App\GraphQL\Mutations;

use App\Models\Project;
use App\Notifications\DatabaseNotification;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class ProjectMutator
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
    public function create($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $project = new Project($args);
        $context->user()->projects()->save($project);
        if (isset($args['provinces']) && !empty($args['provinces'])) {
          $project->provinces()->attach($args['provinces']);
        }
        if (isset($args['regions']) && !empty($args['regions'])) {
          $project->regions()->attach($args['regions']);
        }
        if (isset($args['total_investment']) && !empty($args['total_investment'])) {
          $project->total_investment()->create($args['total_investment']);
        }
        if (isset($args['infrastructure_investment']) && !empty($args['infrastructure_investment'])) {
          $project->infrastructure_investment()->create($args['infrastructure_investment']);
        }

        return $project;
    }

    public function delete($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
      $project = Project::find($args['id']);

      $deletedProject = [];

      if (! $project) {
        return $deletedProject;
      } else {
        $deletedProject = $project->toArray();
        $project->deleted_by = $context->user()->id;
        $project->save();

        $project->delete();

        $user = $context->user();

        $notificationData = [
          'type' => 'deletedProject',
          'from' => $user->email,
          'title' => 'Project Deleted',
          'body' => $deletedProject['title'] . ' was deleted.',
          'actionText' => 'Go back to projects',
          'actionURL' => '/projects'
        ];

        $user->notify(new DatabaseNotification($notificationData));

        return $deletedProject;
      }
    }
}
