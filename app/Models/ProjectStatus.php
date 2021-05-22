<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectStatus extends Model
{
    use SoftDeletes;

    public $incrementing = false;
    
    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}
