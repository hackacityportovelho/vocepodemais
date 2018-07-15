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

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);
Route::get('/login', ['as' => 'login', 'uses' => 'HomeController@index']);


Route::get('/donator', ['as' => 'donator.index', 'uses' => 'DonatorController@index']);
Route::post('/donator/login', ['as' => 'donator.login', 'uses' => 'DonatorController@login']);
Route::get('/donator/create', ['as' => 'donator.create', 'uses' => 'DonatorController@create']);
Route::post('/donator', ['as' => 'donator.store', 'uses' => 'DonatorController@store']);

Route::get('/receiver', ['as' => 'receiver.index', 'uses' => 'ReceiverController@index']);
Route::post('/receiver/login', ['as' => 'receiver.login', 'uses' => 'ReceiverController@login']);
Route::get('/receiver/create', ['as' => 'receiver.create', 'uses' => 'ReceiverController@create']);
Route::post('/receiver', ['as' => 'receiver.store', 'uses' => 'ReceiverController@store']);

Route::middleware('auth')->group(function() {

Route::get('/donator/visualization', ['as' => 'donator.visualization', 'uses' => 'DonatorController@visualization']);
  Route::post('/receiver/point', ['as' => 'receiver.point.store', 'uses' => 'ReceiverController@pointStore']);
  Route::get('/receiver/point/{id}/edit', ['as' => 'receiver.point.edit', 'uses' => 'ReceiverController@pointEdit']);
  Route::patch('/receiver/point/{id}', ['as' => 'receiver.point.update', 'uses' => 'ReceiverController@pointUpdate']);
  Route::get('/receiver/visualization', ['as' => 'receiver.visualization', 'uses' => 'ReceiverController@visualization']);
});

