<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
  const NOT_SCHEDULED = -1;
  const BUILD_STATE = 0;
  const READY_STATE = 1;

  public function user()
  {
    return $this->belongsTo(User::class, 'id');
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

  public function nodes()
  {
    return $this->hasMany(Node::class);
  }

  public function puppetinstances()
  {
    return $this->hasMany(PuppetInstance::class);
  }
}
