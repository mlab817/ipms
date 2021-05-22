<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Version extends Model
{
    protected $fillable = [
    	'version',
    	'change_type',
    	'change_log',
    	'notes',
    	'user_id'
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }
}
