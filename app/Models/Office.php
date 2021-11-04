<?php

namespace App\Models;

use App\Scopes\OfficeScope;
use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected static function booted()
    {
        static::addGlobalScope(new OfficeScope);
    }

    protected $fillable = [
        'name',
        'acronym',
        'email',
        'contact_numbers',
        'office_head_name',
        'office_head_position',
        'ref_operating_unit_id',
    ];

    public function operating_unit(): BelongsTo
    {
        return $this->belongsTo(RefOperatingUnit::class, 'ref_operating_unit_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }

    public function projects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public function reviewers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class,'office_reviewer','office_id','user_id');
    }

    public function getLogoAttribute(): ?string
    {
        return $this->operating_unit
            ? public_path('images') . '/'. strtoupper($this->operating_unit->acronym) . '.png'
            : public_path('images/DA-CO.png');
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
