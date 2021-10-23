<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
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

    public const ROLE_DESCRIPTIONS = [
        'encoder'   => 'Viewing own PAPs and their Office\'s PAPs',
        'spcmad'    => 'Viewing projects that are not proposed (includes ongoing, completed and draft)',
        'pds'       => 'Viewing projects that are proposed',
        'ouri'      => 'Viewing all TRIP PAPs',
        'ipd'       => 'Viewing all PAPs of offices assigned to you',
        'guest'     => 'Does not have permission to access PAPs, offices and users',
    ];

    public static function findByName($name = '')
    {
        return static::where('name','like',$name)->first();
    }

    public function users()
    {
        return $this->hasMany(User::class,'role_id');
    }
}
