<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefPdpIndicator extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'level',
        'parent_id',
        'ref_pdp_chapter_id',
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
        'deleted_at',
        'description',
    ];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function pdp_chapter(): BelongsTo
    {
        return $this->belongsTo(RefPdpChapter::class,'ref_pdp_chapter_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(RefPdpIndicator::class,'parent_id','id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(RefPdpIndicator::class,'parent_id','id')->with('children');
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
