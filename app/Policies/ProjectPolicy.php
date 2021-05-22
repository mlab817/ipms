<?php

namespace App\Policies;

use App\Models\SubmissionStatus;
use App\Models\Project;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
      //
    }

    /**
     * If a user is encoder, they can create a project
     *
     * @param App\User $user
     */
    public function create(User $user)
    {
      // return $user->role_id === 4;
      return $user->role->name == 'encoder';
    }

    /**
     * If a user is owner of a project, an admin or superadmin,
     * they can view the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function view(User $user, Project $project)
    {
      return $user->id == $project->created_by
        || $user->operating_unit_id == $project->operating_unit_id
        || $user->role->name == 'viewer'
        || $user->role->name == 'reviewer'
        || $user->role->name == 'admin'
        || $user->role->name == 'superadmin';
    }

    /**
     * If a user is owner of a project, they can update the project
     * if the project version is equal to the current version
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function update(User $user, Project $project)
    {
      // allow user to update based on status of the project
      // log failed
      $ss = SubmissionStatus::find($project->submission_status_id);
      $status = $ss->name ?? null;

      if ($status == 'Draft') {
         return true;
      } else if ($status == 'Finalized') {
        Log::info($user->name . ' was blocked from updating project');
         return false;
      } else if ($status == 'Endorsed') {
         return $user->role && $user->role->name == 'reviewer';
      } else if ($status == 'Validated') {
         Log::info($user->name .' was blocked from updating project since it is validated.');
         return false;
      }
      // if all else fails
      Log::info($user->name .' was blocked from updating project for not having submission status.');

      return false;
    }

    /**
     * If a user is owner of a project, they can delete the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function delete(User $user, Project $project)
    {
      return $user->id == $project->created_by;
    }

    /**
     * If a user is owner of a project, they can delete the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function forceDelete(User $user, Project $project)
    {
      return $user->id == $project->created_by;
    }

    /**
     * Allow review project if the user is reviewer
     * and is assigned to review operating unit projects
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function review(User $user, Project $project)
    {
      // if user is not a reviewer, do not authorize
      if ($user->role->name != 'reviewer') {
        return false;
      }

      // get operating units being reviewed by user
      $ous = $user->reviews->pluck('id')->toArray();

      // get operating unit owner of project
      $ou = $project->operating_unit_id;

      // check if reviewer is assigned to review ou project
      $result = in_array($ou, $ous);

      // return result
      return $result;
    }

    /**
     * Allow review project if the user is reviewer
     * and is assigned to validate operating unit projects
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function validate(User $user, Project $project)
    {
      // if user is not a reviewer, do not authorize
      if ($user->role->name != 'reviewer') {
        return false;
      }

      // get operating units being reviewed by user
      $ous = $user->reviews->pluck('id')->toArray();
      // get operating unit owner of project
      $ou = $project->operating_unit_id;

      // check if reviewer is assigned to review ou project
      $result = in_array($ou, $ous);

      // return result
      return $result;
    }

    /**
     * Allow review project if the user is reviewer
     * and is assigned to return operating unit projects
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function return(User $user, Project $project)
    {
      // if user is not a reviewer, do not authorize
      if ($user->role->name != 'reviewer') {
        return false;
      }

      // get operating units being reviewed by user
      $ous = $user->reviews->pluck('id')->toArray();
      // get operating unit owner of project
      $ou = $project->operating_unit_id;

      // check if reviewer is assigned to review ou project
      $result = in_array($ou, $ous);

      // return result
      return $result;
    }
}
