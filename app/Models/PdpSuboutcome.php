<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PdpSuboutcome extends Model
{
    public function pdp_outcome(): BelongsTo
    {
      return $this->belongsTo(PdpOutcome::class);
    }

    public function pdp_indicators(): HasMany
    {
      return $this->hasMany(PdpIndicator::class);
    }

    public function children(): HasMany
    {
      return $this->hasMany(PdpIndicator::class);
    }
}
