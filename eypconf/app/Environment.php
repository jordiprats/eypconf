<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model implements bgProcess
{
  const DIR_NAME = 'environment';

  public function setStatus(int $value)
  {
    $this->status=$value;
    $this-save();
  }

  public function platform()
  {
    return $this->belongsTo(Platform::class, 'id');
  }
}
