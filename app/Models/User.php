<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use SoftDeletes;
    use Auditable;
    use Searchable;

    protected $asYouType = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'active',
        'office_id',
        'role_id',
        'avatar',
        'activated_at',
        'password_changed_at',
        'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function findByUsername($username = '')
    {
        return static::where('username', $username)->first();
    }

    public function getRouteKeyName(): string
    {
        return 'username';
    }

    public function audit_logs(): MorphMany
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class,'creator_id','id');
    }

    public function offices(): BelongsToMany
    {
        return $this->belongsToMany(Office::class,'office_reviewer','user_id','office_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProjectReview::class,'user_id','id');
    }

    public function assigned_projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'project_user_permission','user_id','project_id')
            ->withPivot('read','update','delete','review','comment');
    }

    public function seen_projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class,'seen_projects','user_id','project_id')
            ->withTimestamps();
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function isActivated(): bool
    {
        return !!$this->activated_at;
    }

    public function isAdmin(): bool
    {
        return !!$this->is_admin;
    }

    public function isIpd(): bool
    {
        return optional($this->role)->name == 'ipd';
    }

    public function isEncoder(): bool
    {
        return optional($this->role)->name == 'encoder';
    }

    public function isPds(): bool
    {
        return optional($this->role)->name == 'pds';
    }

    public function isSpcmad(): bool
    {
        return optional($this->role)->name == 'spcmad';
    }

    public function isOuri(): bool
    {
        return optional($this->role)->name == 'ouri';
    }


    public function activate()
    {
        $this->activated_at = now();
        $this->save();
    }

    public function deactivate()
    {
        $this->activated_at = null;
        $this->save();
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'activated_at' => 'datetime',
    ];

    public function getFullNameAttribute(): string
    {
        $fullName = '%s %s';
        return sprintf($fullName, $this->first_name, $this->last_name);
    }

    public function scopeByRole($query)
    {
        $authUser = auth()->user();

        if ($authUser->isAdmin()) {
            return $query;
        }

        if ($authUser->isIpd()) {
            return $query->whereIn('office_id', $authUser->offices->pluck('id')->toArray() ?? []);
        }

        if ($authUser->isEncoder()) {
            return $query->where('office_id', $authUser->office_id);
        }
    }

    public function toSearchableArray()
    {
        return [
            'id'            => $this->id,
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'full_name'     => $this->full_name,
            'username'      => $this->username,
            'email'         => $this->email,
            'office'        => $this->office->name ?? '' . $this->office->acronym ?? '',
            'role'          => $this->role->name ?? '',
        ];
    }
}
