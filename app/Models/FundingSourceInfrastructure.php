<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FundingSourceInfrastructure extends Model
{
    protected $fillable = [
        'project_id',
        'funding_source_id',
        'infrastructure_target_2016',
        'infrastructure_target_2017',
        'infrastructure_target_2018',
        'infrastructure_target_2019',
        'infrastructure_target_2020',
        'infrastructure_target_2021',
        'infrastructure_target_2022',
        'infrastructure_target_2023',
        'infrastructure_target_2024',
        'infrastructure_target_2025',
        'infrastructure_target_total',
    ];

    public function funding_source(): BelongsTo
    {
        return $this->belongsTo(FundingSource::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
