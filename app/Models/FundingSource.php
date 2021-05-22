<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundingSource extends Model
{
    use SoftDeletes, HasInvestmentsTrait;

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_funding_source');
    }
}
