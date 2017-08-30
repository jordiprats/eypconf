<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerGroup extends Model
{
  const DIR_NAME = 'sg';

  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }
}
