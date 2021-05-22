<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectProcessingStatus extends Model
{
    protected $fillable = [
      'project_id',
      'processing_status_id',
      'processed_by',
      'processed_at',
      'remarks'
    ];

		public function project(): BelongsTo
    {
      return $this->belongsTo(Project::class);
    }

    public function processing_status(): BelongsTo
    {
      return $this->belongsTo(ProcessingStatus::class);
    }

    public function processor(): BelongsTo
		{
			return $this->belongsTo(User::class,'processed_by','id');
		}
}
