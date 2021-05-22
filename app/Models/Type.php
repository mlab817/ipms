<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
      'name',
      'label'
    ];

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}
