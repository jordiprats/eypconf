<?php

namespace App\Http\Controllers;

use App\PuppetModule;
use Illuminate\Http\Request;

class PuppetModuleController extends Controller
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
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\PuppetModule  $puppetModule
   * @return \Illuminate\Http\Response
   */
  public function show(PuppetModule $puppetModule)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\PuppetModule  $puppetModule
   * @return \Illuminate\Http\Response
   */
  public function edit(PuppetModule $puppetModule)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\PuppetModule  $puppetModule
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PuppetModule $puppetModule)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\PuppetModule  $puppetModule
   * @return \Illuminate\Http\Response
   */
  public function destroy(PuppetModule $puppetModule)
  {
    //
  }
}
