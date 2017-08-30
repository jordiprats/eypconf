<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerType extends Model
{
  const DIR_NAME = 'type';

  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }
}
