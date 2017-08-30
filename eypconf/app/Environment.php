<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
  const DIR_NAME = 'environment';
  
  public function platform()
  {
    return $this->belongsTo(Platform::class, 'id');
  }
}
