<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CostStructure extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function prexc_programs(): HasMany
    {
    	return $this->hasMany(PrexcProgram::class);
    }

    public function children(): HasMany
    {
    	return $this->hasMany(PrexcProgram::class);
    }
}
