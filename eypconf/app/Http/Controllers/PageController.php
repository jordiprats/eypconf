<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;
use App\User;

class PageController extends Controller
{
  public function getNews()
  {
    $latests_users = User::orderBy('created_at')
               ->take(10)
               ->get();
    // $latests_platforms = Platform::orderBy('created_at')
    //            ->take(10)
    //            ->get();
    return view('welcome')->with('users', $latests_users);
  }
}
