<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TenPointAgenda extends Model
{
    public function projects(): BelongsToMany
    {
      return $this->belongsToMany(Project::class,'project_ten_point_agenda');
    }
}
