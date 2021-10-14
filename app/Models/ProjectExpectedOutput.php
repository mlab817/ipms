<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectExpectedOutput extends Model
{
    use HasFactory;

    protected $fillable = [
        'expected_outputs',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
