<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuppetModule extends Model
{
  public function puppetinstances()
  {
    //TODO: crear taula a la db
    //https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
    return $this->belongsToMany(PuppetInstance::class);
  }
}
