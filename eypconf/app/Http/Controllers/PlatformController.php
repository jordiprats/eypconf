<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;
use Auth;

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
          'description' => 'string|max:255',
        ));

        // store in the db
        if(!($user = Auth::user())) {
          // No user logged in - fuck off
        } else {
          $platform = new Platform;

          $platform->platform_name = $request->platform_name;
          $platform->description = $request->description?$request->description:'';
          $platform->eyp_userid = substr(md5(uniqid()),0,12);
          $platform->eyp_magic_hash = substr(md5(uniqid().$user->id),0,12).'_'.substr(md5(uniqid()),0,12);
          $platform->user_id = $user->id;

          $platform->save();

          // $platform->eyp_userid = $platform->id.'_'.$platform->user_id.'_'.uniqid();
          // $platform->save();
        }

        // redirect
        return redirect()->route('platforms.show', $platform->id);
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
      return view('platforms.show')->with('platform', $platform);
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
