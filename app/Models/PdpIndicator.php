<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PdpIndicator extends Model
{
    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class,'project_pdp_indicators','pdp_indicator_id','project_id','id','id');
    }
}
