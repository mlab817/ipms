<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    public $incrementing = false;

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class,'target_start_year','id');
    }
}
