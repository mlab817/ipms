<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectReview extends Model
{
    use HasFactory;
    use HasUuid;
    use Auditable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getRouteKey(): string
    {
        return $this->uuid;
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class)->withDefault();
    }

    public function readiness_level(): BelongsTo
    {
        return $this->belongsTo(RefReadinessLevel::class)->withDefault();
    }

    public function pip_typology(): BelongsTo
    {
        return $this->belongsTo(RefPipTypology::class)->withDefault();
    }

    public function cip_type(): BelongsTo
    {
        return $this->belongsTo(RefCipType::class)->withDefault();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
