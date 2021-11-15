<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'issues',
        'project_updated_at',
    ];

    protected $casts = [
        'issues' => 'array',
    ];
}
