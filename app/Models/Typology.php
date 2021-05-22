<?php

namespace App\Models;

use App\Traits\HasInvestmentsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Typology extends Model
{
    use SoftDeletes, HasInvestmentsTrait;

    protected $fillable = [
      'name',
      'label'
    ];

    public function projects()
    {
      return $this->hasMany(Project::class);
    }
}
