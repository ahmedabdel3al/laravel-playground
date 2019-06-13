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

Route::get('/first-case', 'UserController@test_in_fire_create_model_events');
Route::get('/second-case', 'UserController@test_it_not_fire_any_model_event');
Route::get('/me-case', 'UserController@test_it_remove_specific_model_event');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
