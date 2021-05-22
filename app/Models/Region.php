<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use HasInvestmentsTrait;

    protected $fillable = [
      'project_id',
      'region_id'
    ];

    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class);
    }

    public function provinces(): HasMany
    {
      return $this->hasMany(Province::class);
    }

}
