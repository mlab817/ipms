<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpatialCoverage extends Model
{
    use SoftDeletes, HasInvestmentsTrait;

    protected $fillable = [
      'name'
    ];

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}
