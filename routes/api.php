<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['BasicAuth']], function () {
  Route::get('students/all', 'StudentController@showAll');
  Route::get('/students/edit/{students_id}', 'StudentController@showById');
  Route::post('/students/update/{students_id}', 'StudentController@update');
  Route::post('/students/create/', 'StudentController@store');
  Route::delete('/students/delete/{students_id}', 'StudentController@delete');

  });
