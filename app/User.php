<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

  use Notifiable;

  protected $fillable = [
      'name',
      'email',
      'password',
      'username'
  ];

  public function ads()
  {
    return $this->hasMany(Ad::class);
  }

  public function boost()
  {
    return $this->hasOne(Boost::class);
  }
}
