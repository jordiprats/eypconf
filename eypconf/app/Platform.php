<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function environments()
    {
      return $this->hasMany(Environment::class);
    }

    public function servergroups()
    {
      return $this->hasMany(ServerGroup::class);
    }

    public function servertypes()
    {
      return $this->hasMany(ServerType::class);
    }
}
