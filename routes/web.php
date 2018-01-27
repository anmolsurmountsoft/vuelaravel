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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@showall');
Route::get('/user/edit/{user_id}', 'HomeController@show');
Route::post('/user/update/{user_id}', 'HomeController@update');
Route::post('/user/create/', 'HomeController@store');
Route::delete('/user/delete/{user_id}', 'HomeController@destroy');
