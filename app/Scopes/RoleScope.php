<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class RoleScope implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $user       = auth()->user();
        $roleName   = $user->role->name ?? '';

        if ($user && ! $user->isAdmin()) {
            if ($user->isIpd()) {
                $builder
                    ->whereIn('projects.office_id', $user->offices->pluck('id')->toArray())
                    ->orWhere('projects.creator_id', $user->id);
            }

            if ($user->isEncoder()) {
                $builder->where('projects.office_id', $user->office_id)
                    ->orWhere('projects.creator_id', $user->id);
            }

            if ($roleName == 'pds') {
                $builder->where('projects.ref_pap_type_id', 2) // project
                ->where('projects.ref_project_status_id', 2); // proposed
            }

            if ($roleName == 'spcmad') {
                $builder->where('projects.ref_pap_type_id', 2) // project
                ->where('projects.ref_project_status_id','<>', 2); // all projects except proposed
            }

            if ($roleName == 'ouri') {
                $builder->where('projects.trip', 1); // tagged as TRIP
            }
        }
    }
}