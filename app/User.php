<?php

namespace App;

use Carbon\Carbon;
use App\Models\Login;
use App\Models\Image;
use App\Models\Followable;
use App\Models\Message;
use App\Models\OperatingUnit;
use App\Models\Project;
use App\Models\ProjectProcessingStatus;
use App\Models\Role;
use App\Models\Setting;
use App\Notifications\ResetPassword;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Joselfonseca\LighthouseGraphQLPassport\HasLoggedInTokens;
use Joselfonseca\LighthouseGraphQLPassport\MustVerifyEmailGraphQL;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable, HasLoggedInTokens, MustVerifyEmailGraphQL;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'email',
        'password',
        'contact_number',
        'unit',
        'position',
        'contact_number',
        'operating_unit_id',
        'image_id',
        'role_id',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function routeNotificationForSlack($notification)
    {
        return config('slack.webhook_url');
    }

    public function activities(): MorphMany
    {
      return $this->morphMany(\Spatie\Activitylog\Models\Activity::class,"causer");
    }

    /**
     * This function gets the followers of this entity. The
     * followable_id in the followables relation would be
     * the id of this entity.
     */
    public function followers(): MorphToMany
    {
      return $this->morphToMany(Followable::class,'followable','user_id','id');
    }

    /**
     * Gets the list of users that are followed by this user.
     */
    public function following()
    {
      return $this->morphedByMany(User::class,'followable');
    }

    public function operating_unit(): BelongsTo
    {
      return $this->belongsTo(OperatingUnit::class);
    }

    /**
     * The following method retrieves all projects owned by user
     *
     * @return App\Models\Project $projects
     */
    public function projects(): HasMany
    {
      return $this->hasMany(Project::class,'created_by','id');
    }

    public function role(): BelongsTo
    {
      return $this->belongsTo(Role::class);
    }

    public function receivedMessages(): HasMany
    {
      return $this->hasMany(Message::class,'to');
    }

    public function sentMessages(): HasMany
    {
      return $this->hasMany(Message::class,'from');
    }

    public function getProjectCountAttribute()
    {
      return $this->projects()->count();
    }

    public function getProjectSumAttribute(): float
    {
      return (float) $this->projects()->sum('total_project_cost');
    }

    public function reviews(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class,'operating_unit_reviewer');
    }

    public function reviewed(): HasMany
    {
      return $this->hasMany(Project::class,'reviewed_by','id');
    }

    public function scopeNotSuperAdmin($query)
    {
      return $query->where('id','<>',1);
    }

    public function project_processing_statuses(): HasMany
    {
      return $this->hasMany(ProjectProcessingStatus::class,'processed_by','id');
    }

    public function setting(): HasOne
    {
      return $this->hasOne(Setting::class,'user_id');
    }

    public function getVerifiedAttribute()
    {
        return ! is_null($this->email_verified_at);
    }

    public function scopeReviewer($query)
    {
        return $query->where('role_id',3);
    }

    public function getLastReviewedProjectAttribute()
    {
        return $this->reviewed->max('reviewed_at');
    }

    public function views(): BelongsToMany
    {
      return $this->belongsToMany(OperatingUnit::class,'operating_unit_viewer','user_id','operating_unit_id');
    }

    public function scopeEncoder($query)
    {
      return $query->where('role_id',4); // 4 is encoder
    }

    public function getUserAvatarAttribute()
    {
        return $this->avatar ? config('app.url') . Storage::url($this->avatar) : null;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function logins()
    {
      return $this->hasMany(Login::class,'user_logins','user_id','id');
    }

    public function setLoginLog()
    {
      Log::info($this->name . ' (' . $this->email  .') logged in just now');

      $this->logins()->insert([
        'user_id' => $this->id,
        'login_at' => Carbon::now()
      ]);
    }

    public function tags(): BelongsToMany
    {
      return $this->belongsToMany(Tag::class);
    }
}
