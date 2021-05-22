<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SustainableDevelopmentGoal extends Model
{
    use SoftDeletes;
    
    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class,'project_sustainable_development_goal','sdg_id','project_id','id','id');
    }
}
