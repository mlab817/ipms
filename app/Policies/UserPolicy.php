<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return !!$user;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        if ($user->isAdmin()) {
            return true;
        }

        if (in_array($user->role->name, ['ipd','spcmad','pds','ouri'])) {
            return true;
        }

        // if user has no role
        if ($user->role->name == 'encoder' && $user->office_id == $model->office_id) {
            return true;
        }

        return $this->deny('You can only view a user if you are an admin, an ipd, a spcmad, a pds or ouri staff or you belong to the office');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can create a user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can update a user');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can delete a user');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can restore a user');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only an admin can force delete a user');
    }
}
