<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'to',
    	'user_id'
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
