<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tier extends Model
{
    use SoftDeletes, HasInvestmentsTrait;

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }

    public function prexc_activities(): HasMany
    {
      return $this->hasMany(PrexcActivity::class);
    }
}
