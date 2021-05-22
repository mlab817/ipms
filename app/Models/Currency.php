<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
      'id',
      'country',
      'name',
      'symbol',
      'convertible'
    ];

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }
}
