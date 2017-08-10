<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerType extends Model
{
  public function platform()
  {
      return $this->belongsTo(Platform::class);
  }
}
