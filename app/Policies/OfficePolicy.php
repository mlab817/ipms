<?php

namespace App\Policies;

use App\Models\Office;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return !!$user;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Office $office)
    {
        if ($user->isAdmin()) {
            return true;
        }

        if (in_array($user->role->name, ['ipd','spcmad','pds','ouri'])) {
            return true;
        }

        // if user has no role
        if ($user->role->name == 'encoder' && $user->office_id == $office->id) {
            return true;
        }

        return $this->deny('You can only view an office if you are an admin, an ipd, a spcmad, a pds or ouri staff or you belong to the office');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // only admins can create offices
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can create an office');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Office $office)
    {
        // only admins can create offices
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can update an office');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Office $office)
    {
        // only admins can create offices
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can delete an office');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Office $office)
    {
        // only admins can create offices
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can restore an office');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Office $office)
    {
        // only admins can create offices
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can force delete an office');
    }
}
