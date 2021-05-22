<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $fillable = [
    'name',
    'guard_name'
  ];

  public function roles(): BelongsToMany
    {
      return $this->belongsToMany(Role::class,'permission_role','permission_id','role_id');
    }
}
