<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;
use App\User;
use App\Platform;

class EnvironmentController extends Controller
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
  public function create($username, $platform_name)
  {
    $user = User::where('username', $username)->first();
    $platform = Platform::where('user_id', $user->id)
        ->where('platform_name', $platform_name)->first();

    if($platform->user!=$user)
      return "nasty";

    return view('environments.create')->with('platform', $platform)->with('user', $user);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $username, $platform_name)
  {
    $user = User::where('username', $username)->first();
    $platform = Platform::where('user_id', $user->id)
        ->where('platform_name', $platform_name)->first();

    if($platform->user!=$user)
      return "nasty";

    //validate
    $this->validate($request, array(
      'environment_name' => 'required|string|max:25',
      'description' => 'string|max:255',
    ));

    //store db
    $environment = new Environment;

    $environment->environment_name = $request->environment_name;
    $environment->description = $request->description?$request->description:'';
    $environment->platform_id = $platform->id;

    $environment->save();

    //redirect
    return redirect()->route('show.eyp.user.platform.env', [ 'user' => $user->username, 'platform' => $platform->platform_name, 'environment' => $environment->environment_name ]);
  }

  /**
   * search for environment resource
   *
   * @param  \App\Environment  $environment
   * @return \Illuminate\Http\Response
   */
  //TODO: falta implemetar
  public function showEnvironment($username, $platform_name, $environment_name)
  {
    return $username.' '.$platform_name.' '.$environment_name;
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Environment  $environment
   * @return \Illuminate\Http\Response
   */
  public function show(Environment $environment)
  {
    return "???";
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Environment  $environment
   * @return \Illuminate\Http\Response
   */
  public function edit(Environment $environment)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Environment  $environment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Environment $environment)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Environment  $environment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Environment $environment)
  {
    //
  }
}
