<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Share extends Model
{

    protected $table = 'project_share';

    protected $fillable = [
      'project_id',
      'email',
      'token',
      'shared_by'
    ];

    public function project(): BelongsTo
    {
      return $this->belongsTo(Project::class,'project_id','id');
    }

    public function user(): BelongsTo
    {
      return $this->belongsTo(User::class,'shared_by','id');
    }
}
