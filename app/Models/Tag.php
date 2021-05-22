<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
      'name',
      'slug'
    ];

    public function prexc_activities(): BelongsToMany
    {
      return $this->belongsToMany(PrexcActivity::class);
    }

    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class);
    }

    public function users(): BelongsToMany
    {
      return $this->belongsToMany(User::class);
    }
}
