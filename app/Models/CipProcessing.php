<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CipProcessing extends Model
{
    protected $fillable = [
      'neda_submission',
      'neda_submission_date',
      'neda_secretariat_review',
      'neda_secretariat_review_date',
      'icc_endorsed',
      'icc_endorsed_date',
      'icc_approved',
      'icc_approved_date',
      'neda_board',
      'neda_board_date'
    ];

    public function project(): BelongsTo
    {
      return $this->belongsTo(Project::class);
    }
}
