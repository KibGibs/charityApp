<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@home');
Route::get('/login', 'HomeController@login');
Route::post('/login/post', 'HomeController@doLogin');
Route::get('/logout', 'HomeController@logout');

/* Users */
Route::get('/users', 'HomeController@users');
Route::get('/users/add', 'HomeController@addUser');
Route::post('/users/register/', 'HomeController@register');
Route::get('/users/edit/{id}', 'HomeController@editUser');
Route::post('/users/update/{id}', 'HomeController@update');

/* Program */
Route::get('/program', 'ProgramController@getIndex');
Route::post('/program/add/post', 'ProgramController@saveProgram');
Route::get('/program/detail/{program?}', 'ProgramController@getProgramDetail');
Route::get('/program/detail/add/{program?}', 'ProgramController@addProgramDetail');

/* Barangay */
Route::get('/barangay', 'BarangayController@getIndex');
Route::get('/barangay/add/{barangay?}', 'BarangayController@getIndexAdd');
Route::post('/barangay/add/post/', 'BarangayController@save');
Route::get('/barangay/delete/{barangay?}', 'BarangayController@delete');
