<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;
use Auth;
use App\User;
use App\Jobs\GitInit;

class PlatformController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('platforms.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // validate
    $this->validate($request, array(
      'platform_name' => 'required|string|max:255',
      'description' => 'max:255',
    ));

    // store in the db
    if(!($user = Auth::user()))
    {
      // No user logged in - fuck off
      return redirect()->route('platforms.create');
    }
    else
    {
      $platform = new Platform;

      $platform->platform_name = $request->platform_name;
      $platform->description = $request->description?$request->description:'';
      $platform->slug = str_slug($request->platform_name, '-');
      $platform->eyp_userid = str_slug($request->platform_name, '_')."_".substr(md5(uniqid()),0,12);
      $platform->eyp_magic_hash = substr(md5(str_random(10).uniqid().$user->id),0,12).substr(md5(str_random(10).$platform->description.uniqid().$request->platform_name),0,12);
      $platform->user_id = $user->id;

      $platform->save();

      try
      {
        // try code
        dispatch(new GitInit($platform));
      }
      catch(\Exception $e){
        $platform->status=-1;
        $platform->save();
      }

    }

    // redirect
    return redirect()->route('show.eyp.user.platform', [ 'user' => $user->username, 'platform' => $platform->slug]);
  }

  public function getUserPlatform($username, $platform_name)
  {
    if(User::where('username', $username)->count() == 1)
    {
      $user = User::where('username', $username)->first();
      $platform = Platform::where('user_id', $user->id)
          ->where('slug', $platform_name)->first();
      return view('platforms.show')->with('platform', $platform)->with('user', $user);
    }
    else
      return "error";
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $platform = Platform::find($id);
    return view('platforms.show')->with('platform', $platform)->with('user',null);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
