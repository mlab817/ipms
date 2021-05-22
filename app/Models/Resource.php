<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'title',
      'description',
      'url',
      'image_url',
      'document_type',
      'added_by',
      'updated_by'
    ];

    public function adder(): BelongsTo
    {
        return $this->belongsTo(User::class,'added_by','id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by','id');
    }

    public function deleter(): BelongsTo
    {
        return $this->belongsTo(User::class,'deleted_by','id');
    }
}
