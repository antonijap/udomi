<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model

{
  protected $fillable = [
      'name',
      'description',
      'user_id',
      'sex',
      'age',
      'location'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
