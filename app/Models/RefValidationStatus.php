<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefValidationStatus extends Model
{
    use HasFactory;

    public static function findByName($name)
    {
        return static::where('name', $name)->first();
    }

    public function projects()
    {
        return $this->hasMany(Project::class,'ref_validation_status_id');
    }
}
