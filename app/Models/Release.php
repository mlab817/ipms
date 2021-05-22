<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Release extends Model
{
    protected $fillable = [
    	'version',
			'summary',
			'change_log',
			'notes',
			'user_id',
    ];

    public function user(): BelongsTo
    {
    	return $this->belongsTo(User::class);
    }
}
