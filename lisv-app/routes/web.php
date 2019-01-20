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

Route::get('/signup', 'RegistrationController@show');

Route::post('/signup', 'RegistrationController@store');

Route::get('/signin', 'SessionsController@show');

Route::post('/signin', 'SessionsController@store');

Route::get('/signout', 'SessionsController@destroy');

