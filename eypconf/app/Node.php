<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
  const DIR_NAME = 'node';

  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }
}
