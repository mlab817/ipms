<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
      'id',
      'name',
      'ident',
      'description',
      'active',
      'level'
    ];

    protected $casts = [
      'active' => 'bool',
      'level' => 'int'
    ];

    public function users(): HasMany
    {
      return $this->hasMany(User::class);
    }

    public function permissions(): BelongsToMany
    {
      return $this->belongsToMany(Permission::class);
    }
}
