<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    protected $fillable = [
      'subject',
      'message',
      'created_by'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
