<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class OperatingUnit extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'id',
      'operating_unit_type_id',
      'name',
      'acronym',
      'address',
      'image',
      'agency_head_name',
      'agency_head_designation',
      'telephone_number',
      'fax_number',
      'email'
    ];

    public function activities()
    {
      return $this->belongsToMany(Activity::class,'operating_unit_activity','operating_unit_id','activity_id');
    }

    public function operating_unit_type(): BelongsTo
    {
      return $this->belongsTo(OperatingUnitType::class);
    }

    public function profile(): HasMany
    {
      return $this->hasMany(Profile::class,'operating_unit_id','id');
    }

    public function projects(): HasMany
    {
      return $this->hasMany(Project::class);
    }

    public function users(): HasMany
    {
      return $this->hasMany(User::class);
    }

    public function reviewers(): BelongsToMany
    {
      return $this->belongsToMany(User::class,'operating_unit_reviewer','operating_unit_id','user_id');
    }

    public function getCountProjectAttribute(): Int
    {
      return (int) $this->projects()->count();
    }

    public function getImageUrlAttribute()
    {
      return $this->image ? config('app.url') . Storage::url($this->image) : null;
    }

    public function focals(): HasMany
    {
      return $this->hasMany(User::class,'operating_unit_id','id');
    }

    public function viewers(): BelongsToMany
    {
      return $this->belongsToMany(User::class,'operating_unit_viewer','operating_unit_id','user_id');
    }

    public function prexc_activities(): HasMany
    {
        return $this->HasMany(PrexcActivity::class);
    }

    public function prexc_programs(): BelongsToMany
    {
        return $this->belongsToMany(PrexcProgram::class,'operating_unit_prexc_program','operating_unit_id','prexc_program_id','id','id');
    }

    public function prexc_subprograms(): BelongsToMany
    {
        return $this->belongsToMany(PrexcSubprogram::class,'operating_unit_prexc_subprogram','operating_unit_id','prexc_subprogram_id','id','id');
    }

    public function consolidates(): BelongsToMany
    {
      return $this->belongsToMany(BannerProgram::class, 'banner_program_operating_unit','operating_unit_id','banner_program_id','id','id');
    }
}
