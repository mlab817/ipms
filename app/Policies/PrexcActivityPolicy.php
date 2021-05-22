<?php

namespace App\Policies;

use App\Models\PrexcActivity;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class PrexcActivityPolicy
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
      return $user->role && $user->role->name == 'encoder';
    }

    /**
     * If a user is owner of a project, an admin or superadmin,
     * they can view the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function view(User $user, PrexcActivity $prexc_activity)
    {
      return $user->operating_unit_id == $prexc_activity->operating_unit_id
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
    public function update(User $user, PrexcActivity $prexc_activity, array $args)
    {
      // TODO: Should also allow reviewer to edit prexc_activity
      return $user->operating_unit->id == $prexc_activity->operating_unit_id;
    }

    /**
     * If a user is owner of a project, they can delete the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function delete(User $user, PrexcActivity $prexc_activity)
    {
      return $user->operating_unit->id == $prexc_activity->operating_unit_id;
    }

    /**
     * If a user is owner of a project, they can delete the project
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function forceDelete(User $user, PrexcActivity $prexc_activity)
    {
      return $user->operating_unit->id == $prexc_activity->operating_unit_id;
    }

    /**
     * Allow review project if the user is reviewer
     * and is assigned to review operating unit projects
     *
     * @param App\User $user
     * @param App\Models\Project $project
     */
    public function review(User $user, PrexcActivity $prexc_activity)
    {
      // if user is not a reviewer, do not authorize
      if ($user->role->name != 'reviewer') {
        return false;
      }

      // get operating units being reviewed by user
      $ous = $user->reviews->pluck('id')->toArray();

      // get operating unit owner of project
      $ou = $prexc_activity->operating_unit_id;

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
    public function validate(User $user, PrexcActivity $prexc_activity)
    {
      // if user is not a reviewer, do not authorize
      if ($user->role->name != 'reviewer') {
        return false;
      }

      // get operating units being reviewed by user
      $ous = $user->reviews->pluck('id')->toArray();
      // get operating unit owner of project
      $ou = $prexc_activity->operating_unit_id;

      // check if reviewer is assigned to review ou project
      $result = in_array($ou, $ous);

      // return result
      return $result;
    }
}
