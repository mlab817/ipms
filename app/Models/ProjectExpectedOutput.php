<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectExpectedOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'target',
        'ref_output_indicator_id',
//        'expected_outputs',
    ];

    public function output_indicator(): BelongsTo
    {
        return $this->belongsTo(RefOutputIndicator::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
