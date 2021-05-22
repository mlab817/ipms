<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatingUnitType extends Model
{
    use SoftDeletes;

    public function operating_units(): HasMany
    {
      return $this->hasMany(OperatingUnit::class);
    }
}
