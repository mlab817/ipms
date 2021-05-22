<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PipolStatus extends Model
{
    protected $fillable = [
        'name',
	    'slug',
    ];

    public function projects(): HasMany
    {
    	return $this->hasMany(Project::class);
    }
}
