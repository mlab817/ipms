<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;
    use Auditable;

    /*
     * Roles:
     * admin - all
     * ipd - all
     * pds - proposed && project
     * spcmad - ongoing && project
     * ouri - all trip
     * encoder - own only/same office
     */
}
