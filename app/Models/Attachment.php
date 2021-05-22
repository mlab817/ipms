<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    protected $fillable = [
    	'uuid',
			'project_id',
			'attachment_type_id',
			'file_name',
			'file_size',
			'file_extension',
			'file_type',
			'file_path',
			'dropbox_link',
			'uploaded_by',
			'deleted_by',
    ];

    public function attachment_type(): BelongsTo
    {
    	return $this->belongsTo(AttachmentType::class);
    }

    public function project(): BelongsTo
    {
    	return $this->belongsTo(Project::class);
    }

    public function uploader(): BelongsTo
    {
    	return $this->belongsTo(User::class,'uploaded_by','id');
    }
}
