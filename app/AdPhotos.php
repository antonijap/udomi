<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPhotos extends Model
{
  protected $fillable = [
    'ad_id',
    'filename'
  ];

  public function ad()
  {
    return $this->belongsTo(Ad::class);
  }
}
