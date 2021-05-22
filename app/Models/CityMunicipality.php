<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CityMunicipality extends Model
{
    protected $fillable = [
      'id',
      'name',
      'city_municipality_name',
      'population_2015',
      'area_km2',
      'population_density',
      'barangay',
      'province_id',
      'class'
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
