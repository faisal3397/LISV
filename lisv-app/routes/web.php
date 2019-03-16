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


Route::get('/tasks', 'TasksController@show');

Route::post('/tasks', 'TasksController@store');

Route::get('/shops', 'ShopsController@show');

Route::post('/shops', 'ShopsController@store');

Route::get('/cards', 'CardsController@show');

Route::post('/cards', 'CardsController@store');

Route::delete('/cards/{id}', 'CardsController@destroy')->name('cards.destroy');
Route::put('/cards/{id}', 'CardsController@update')->name('cards.update');

Route::delete('/tasks/{id}', 'TasksController@destroy')->name('tasks.destroy');
Route::put('/tasks/{id}', 'TasksController@update')->name('tasks.update');

Route::get('/insurance', 'InsuranceController@show');
Route::post('/insurance', 'InsuranceController@store');
Route::delete('/insurance/{id}', 'InsuranceController@destroy')->name('insurance.destroy');
Route::put('/insurance/{id}', 'InsuranceController@update')->name('insurance.update');

Route::get('/carRegistration', 'CarRegistrationController@show');
Route::post('/carRegistration', 'CarRegistrationController@store');
Route::delete('/carRegistration/{id}', 'CarRegistrationController@destroy')->name('registration.destroy');
Route::put('/carRegistration/{id}', 'CarRegistrationController@update')->name('registration.update');


Route::get('/t',function(){
    $date = new DateTime("now", new DateTimeZone('Asia/Riyadh') );
    echo $date->format('Y-m-d H:i:s');
});