<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Processing extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'project_id',
      'processing_status_id',
      'remarks',
      'processed_by'
    ];

    public function processor(): BelongsTo
    {
      return $this->belongsTo(User::class,'processed_by');
    }

    public function processing_status(): BelongsTo
    {
      return $this->belongsTo(ProcessingStatus::class);
    }

    public function project(): BelongsTo
    {
      return $this->belongsTo(Project::class);
    }

    public function getProcessedAtAttribute()
    {
      return $this->created_at;
    }
    
}
