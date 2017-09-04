<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

interface bgProcess
{
  public function setStatus(int $value);
}
