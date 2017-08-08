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
}
