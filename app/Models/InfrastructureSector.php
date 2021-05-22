<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InfrastructureSector extends Model
{
    protected $fillable = [
      'name',
    ];

    public function infrastructure_subsectors(): HasMany
    {
        return $this->hasMany(InfrastructureSubsector::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(InfrastructureSubsector::class);
    }
}
