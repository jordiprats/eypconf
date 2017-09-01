<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuppetInstance extends Model
{
  public function platforms()
  {
    return $this->hasMany(Platforms::class);
  }

  public function puppetmodules()
  {
    //TODO: crear taula a la db
    //https://laravel.com/docs/5.4/eloquent-relationships#many-to-many
    return $this->belongsToMany(PuppetModule::class)->withTimestamps();
  }
}
