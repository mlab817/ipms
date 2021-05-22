<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmissionStatus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function prexc_activities(): HasMany
    {
        return $this->hasMany(PrexcActivity::class);
    }
}
