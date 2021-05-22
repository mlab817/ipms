<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FundingInstitution extends Model
{
    public function projects(): HasMany
    {
      return $this->hasMany(Project::class,'funding_institution_id','id');
    }
}
