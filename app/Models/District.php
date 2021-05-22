<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{ 
    use SoftDeletes;
    
    protected $fillable = [
        'id',
        'name',
        'province_id'
    ];  

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,"project_district","district_id","project_id");
    }
    
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    
}
