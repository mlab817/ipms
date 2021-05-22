<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gad extends Model
{
    protected $fillable = [
      'id',
      'name'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
