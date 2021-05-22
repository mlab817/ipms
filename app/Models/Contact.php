<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
  protected $fillable = [
    'name',
    'email',
    'designation',
    'operating_unit_id',
    'user_id',
    'phone_number',
    'fax_number'
  ];

  public function operating_unit(): BelongsTo
  {
    return $this->belongsTo(OperatingUnit::class,'operating_unit_id','id');
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class,'user_id','id');
  }

  public function creator(): BelongsTo
  {
    return $this->belongsTo(User::class,'created_by','id');
  }

  public function deleter(): BelongsTo
  {
    return $this->belongsTo(User::class,'deleted_by','id');
  }

  public function updater(): BelongsTo
    {
      return $this->belongsTo(User::class,'updated_by','id');
    }
}
