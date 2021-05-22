<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PdpChapter extends Model
{
    public function projects(): BelongsToMany
    {
    	return $this->belongsToMany(Project::class,'project_pdp_chapter','pdp_chapter_id','project_id');
    }

    public function pdp_outcomes(): HasMany
    {
      return $this->hasMany(PdpOutcome::class);
    }

    public function children(): HasMany
    {
      return $this->hasMany(PdpOutcome::class);
    }
}
