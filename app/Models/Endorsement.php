<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endorsement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'file_name',
        'file_path',
        'file_size',
        'file_extension',
        'file_type',
        'file_path',
        'dropbox_link',
        'remarks',
        'uploaded_by',
        'link'
    ];

    protected $casts = [
        'dropbox_link' => 'array'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class,'uploaded_by','id');
    }

    public function deleter(): BelongsTo
    {
        return $this->belongsTo(User::class,'uploaded_by','id');
    }
}
