<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
			'name',
			'type', // avatar, ou
			'mime_type',
			'extension',
			'size',
			'dropbox_path',
			'dropbox_link',
			'uploader_id',
    ];

    public function uploader(): BelongsTo
    {
    	return $this->belongsTo(User::class,'uploader_id','id');
    }
}
