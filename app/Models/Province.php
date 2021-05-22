<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'id',
      'name',
      'region_id'
    ];

    public function region(): BelongsTo
    {
      return $this->belongsTo(Region::class);
    }

    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class);
    }
}
