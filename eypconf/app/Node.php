<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }
}
