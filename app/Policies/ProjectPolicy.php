<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class ProjectPolicy
{
    use HandlesAuthorization;

    protected string $validatedMessage = 'This PAP has already been validated.';

    /**
     * Check if it is already past the deadline.
     *
     * @return bool
     */
    public function isPastDeadline(): bool
    {
        $deadline = config('ipms.deadline');

        return Carbon::create($deadline)->isPast();
    }

    /**
     * Determine whether the user can view index.
     *
     * @param User|null $user
     * @return mixed
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param Project $project
     * @return mixed
     */
    public function view(User $user, Project $project)
    {
        if ($user->id == $project->creator_id) {
            return true;
        }

        if ($user->isAdmin()) {
            return true;
        }

        if ($user->isIpd()) {
            return $user->offices->contains($project->office_id);
        }

        if ($user->isSpcmad()) {
            return $project->ref_pap_type_id == 2 && $project->ref_project_status_id <> 2;
        }

        if ($user->isPds()) {
            return $project->ref_pap_type_id == 2 && $project->ref_project_status_id == 2;
        }

        if ($user->isEncoder()) {
            return $project->office_id == $user->office_id
                || $project->creator_id == $user->id;
        }

        if ($user->isOuri()) {
            return $project->trip; // tagged as TRIP
        }

        return $this->deny('You do not have access to this PAP.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($this->isPastDeadline()) {
            return $this->deny('The system no longer allows creation of PAPs as it is already past the deadline');
        }

        if ($user->isEncoder()) {
            return true;
        }

        return $this->deny('Only encoders can create PAPs.');;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Project $project
     * @return mixed
     */
    public function update(User $user, Project $project)
    {
        // if project has already been validated, disable update
        if ($project->isValidated()) {
            return $this->deny($this->validatedMessage);
        }

        if ($this->isPastDeadline() && $user->isEncoder()) {
            return $this->deny('The system no longer allows updating of PAPs by encoders as it is already past the deadline');
        }

        // if project is endorsed, only IPD can edit it
        if ($project->isEndorsed() && ! $user->isIpd()) {
            return $this->deny('PAP has already been endorsed. Only IPD staff can edit.');
        }

        // if project is dropped, only IPD can edit it
        if ($project->isDropped() && ! $user->isIpd()) {
            // TODO: allow IPD to undrop,
            // for tracking
            return $this->deny('PAP has been dropped. Only IPD staff can edit.');
        }

        // if user belongs to the same office as the project office
        // or if the project belongs to user
        // or if the role is ipd
        if ($project->office_id == $user->office_id
            || $project->creator_id == $user->id
            || $user->isIpd()) {
            return true;
        }

        // all conditions return false
        return $this->deny('You are not allowed to edit this PAP');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function delete(User $user, Project $project)
    {
        // only admin can delete projects
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only admins can delete deleted PAPs.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function restore(User $user, Project $project)
    {
        // only admin can delete projects
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only admins can restore deleted PAPs.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Project $project
     * @return bool
     */
    public function forceDelete(User $user, Project $project)
    {
        // only admin can delete projects
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only admins can force delete deleted PAPs.');;
    }

    public function endorse(User $user, Project $project)
    {
        if ($project->isEndorsed()) {
            return false;
        }

        // if it is past the deadline,
        // only ipd can endorse pap
        if ($this->isPastDeadline()) {
            if ($user->isIpd()) {
                return true;
            }

            return $this->deny('The system no longer allows endorsement of PAPs by encoders as it is already past the deadline');
        }

        if ($project->isValidated()) {
            return $this->deny('This PAP has already been validated.');
        }

        if ($project->office_id == $user->office_id
            || $project->creator_id == $user->id) {
            return true;
        }

        return $this->deny('Only owners and users belonging to the same office as the PAP can endorse it');
    }

    public function drop(User $user, Project $project)
    {
        if ($project->isDropped()) {
            return false;
        }

        if ($project->isValidated()) {
            return $this->deny('This PAP has already been validated.');
        }

        // if it is past the deadline
        // only IPD can drop a PAP
        if ($this->isPastDeadline()) {
            if ($user->isIpd()) {
                return true;
            }

            return $this->deny('The system no longer allows updating of PAPs by encoders as it is already past the deadline');
        }

        if ($project->office_id == $user->office_id
            || $project->creator_id == $user->id) {
            return true;
        }

        return $this->deny('Only owners and users belonging to the same office as the PAP can drop it');
    }

    public function undrop(User $user, Project $project)
    {
        if (! $project->isDropped()) {
            return false;
        }

        if ($this->isPastDeadline()) {
            return $this->deny('The system no longer allows updating of PAPs by encoders as it is already past the deadline');
        }

        if ($project->isValidated()) {
            return $this->deny($this->validatedMessage);
        }

        // owner
        // same office
        // ipd can undrop PAP
        if ($project->office_id == $user->office_id
            || $project->creator_id == $user->id
            || $user->isIpd()) {
            return true;
        }

        return $this->deny('Only owners and users belonging to the same office as the PAP and IPD can undo the its dropping');
    }

    public function validate(User $user, Project $project)
    {
        if ($user->isIpd()) {
            return true;
        }

        return $this->deny('Only IPD can validate PAPs.');
    }

    /**
     * Only IPD are allowed to encode PAPs into PIPOL.
     * 
     * @param User $user
     * @param Project $project
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function encode(User $user, Project $project)
    {
        if ($user->isIpd()) {
            return true;
        }

        return $this->deny('Only IPD can encode PAPs to PIPOL System.');
    }

    /**
     * Only admins are allowed to transfer PAP.
     *
     * @param User $user
     * @param Project $project
     * @return bool|\Illuminate\Auth\Access\Response
     */
    public function transfer(User $user, Project $project)
    {
        if ($user->isAdmin()) {
            return true;
        }

        return $this->deny('Only admin can transfer PAP ownership');
    }
}
