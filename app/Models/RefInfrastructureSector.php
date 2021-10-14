<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefInfrastructureSector extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'uuid',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function children(): HasMany
    {
        return $this->hasMany(RefInfrastructureSubsector::class);
    }

    public function infrastructure_subsectors(): HasMany
    {
        return $this->hasMany(RefInfrastructureSubsector::class);
    }

    public function projects(): HasManyThrough
    {
        return $this->hasManyThrough(Project::class, RefInfrastructureSubsector::class);
    }

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
