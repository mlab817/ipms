<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfrastructureSubsector extends Model
{
    protected $fillable = [
        'name',
        'infrastructure_sector_id'
    ];

    public function infrastructure_sectors(): BelongsTo
    {
        return $this->belongsTo(InfrastructureSubsector::class);
    }
}
