<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefPipolStatus extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class, 'ref_pipol_status_id');
    }

    public static function findByName($name = '')
    {
        return static::where('name', $name)->first();
    }
}
