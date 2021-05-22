<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BannerProgram extends Model
{
    protected $fillable = [
      'name',
      'acronym'
    ];

    public function consolidators(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class);
    }

    public function prexc_activities(): HasMany
    {
      return $this->hasMany(PrexcActivity::class,'banner_program_id','id');
    }

    public function projects(): HasMany
    {
    	return $this->hasMany(Project::class);
    }
}
