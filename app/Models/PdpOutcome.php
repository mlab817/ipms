<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PdpOutcome extends Model
{
    public function pdp_chapter(): BelongsTo
    {
      return $this->belongsTo(PdpChapter::class);
    }

    public function pdp_suboutcomes(): HasMany
    {
      return $this->hasMany(PdpSuboutcome::class);
    }

    public function children(): HasMany
    {
      return $this->hasMany(PdpSuboutcome::class);
    }
}
