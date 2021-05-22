<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
		public $incrementing = false;

		protected $primaryKey = 'user_id';

    protected $fillable = [
    		'user_id',
    		'compact',
    		'dark'
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
