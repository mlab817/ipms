<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImplementationMode extends Model
{
    use SoftDeletes;
    
    /**
     * Return the list of projects belonging to implementation mode.
     * 
     * @return  array
     */
    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}
