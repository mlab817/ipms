<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentType extends Model
{
    protected $fillable = [
      'id',
      'name'
    ];

    public function attachments()
    {
    	return $this->hasMany(Attachment::class);
    }
}
