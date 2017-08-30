<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;
use App\User;
use App\Platform;
use Validator;
use App\Jobs\CreateNewItem;

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

    // if($platform->user!=$user)
    //   return "nasty";

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

    // if($platform->user!=$user)
    //   return "nasty";

    $request->merge(array('slug' => str_slug($request->environment_name, '-')));

    //validate

    //TODO: validació index uniq - https://laravel.io/forum/03-11-2014-validation-unique-to-user
    $validator = Validator::make($request->all(), [
      'environment_name' => 'required|string|max:25',
      'slug' => 'unique:environments,slug,NULL,'.$request->slug.',platform_id,'.$platform->id,
      'description' => 'string|max:255',
    ], [
      'slug.unique'=>'The environment name in ASCII form is already taken.',
    ]);

    if ($validator->fails()) {
      //gestió errors
      //https://scotch.io/tutorials/laravel-form-validation
      // return "error validacio";
      return view('environments.create')->with('platform', $platform)->with('user', $user)->with('errors',$validator->errors());
    }

    //store db
    $environment = new Environment;

    $environment->environment_name = $request->environment_name;
    $environment->slug = $request->slug;
    $environment->description = $request->description?$request->description:'';
    $environment->platform_id = $platform->id;

    $environment->save();

    dispatch(new CreateNewItem($platform, $environment));

    //redirect
    return redirect()->route('show.eyp.user.platform.env', [ 'user' => $user->username, 'platform' => $platform->slug, 'environment' => $environment->slug ]);
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
