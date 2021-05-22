<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subprogram extends Model
{
    //

    public function program()
    {
      return $this->belongsTo(Program::class);
    }
}
