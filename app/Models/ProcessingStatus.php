<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessingStatus extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name'
    ];

    public function project_processing_statuses(): HasMany
    {
      return $this->hasMany(ProjectProcessingStatus::class);
    }

    public function projects(): HasMany
    {
    	return $this->hasMany(Project::class);
    }

    public function getCountProjectsAttribute()
    {
    	return $this->projects->count();
    }
}
