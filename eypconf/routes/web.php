<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/settings/profile', 'UserController@edit')->name('user.edit');
Route::post('/settings/profile', 'UserController@edit')->name('user.edit');
Route::put('/settings/profile.update', 'UserController@update')->name('user.update');
Route::post('/settings/profile.update', 'UserController@update')->name('user.update');


Route::resource('/platforms', 'PlatformController');
Route::resource('/environments', 'EnvironmentController');
Route::resource('/servergroups', 'ServerGroupController');
Route::resource('/servertypes', 'ServerGroupController');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/eyp/{user}/{platform}', 'PlatformController@getUserPlatform');
