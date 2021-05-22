<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrexcSubprogram extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'id',
    	'name',
    	'acronym',
      'uacs_code',
    	'prexc_program_id',
      'title',
      'organizational_outcome',
      'objective_statement',
      'program_strategy',
      'outcome_indicators',
      'output_indicators',
    ];

    public function prexc_activities(): HasMany
    {
    	return $this->hasMany(PrexcActivity::class);
    }

    public function children(): HasMany
    {
    	return $this->hasMany(PrexcActivity::class);
    }

    public function prexc_program(): BelongsTo
    {
    	return $this->belongsTo(PrexcProgram::class);
    }

    public function operating_units(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class);
    }

    public function getLabelAttribute()
    {
      return $this->uacs_code . '_'. $this->name;
    }
}
