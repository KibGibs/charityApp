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
Route::get('/program/add/{program?}', 'ProgramController@programAddIndex');
Route::post('/program/add/post', 'ProgramController@saveProgram');
Route::get('/program/detail/{program?}', 'ProgramController@getProgramDetail');
Route::get('/program/detail/add/{program?}', 'ProgramController@addProgramDetail');
Route::get('/program/subactivity/get/{program?}', 'ProgramController@getSubActivity');

/* Barangay */
Route::get('/barangay', 'BarangayController@getIndex');
Route::get('/barangay/add/{barangay?}', 'BarangayController@getIndexAdd');
Route::post('/barangay/add/post/', 'BarangayController@save');
Route::get('/barangay/delete/{barangay?}', 'BarangayController@delete');

/* Activity */
Route::get('/activity', 'ActivityController@getIndex');
Route::get('/activity/add/{activity?}', 'ActivityController@getIndexAdd');
Route::post('/activity/add/post', 'ActivityController@save');
Route::get('/activity/delete/{activity?}', 'ActivityController@delete');

Route::get('/activity/sub/{subactivity?}', 'ActivityController@getIndexSubActivity');
Route::get('/activity/sub/delete/{subactivity?}', 'ActivityController@deleteSubActivity');
Route::post('/activity/sub/save/', 'ActivityController@saveSubActivity');

Route::get('/activity/detail/{activity?}/', 'ActivityController@getActivityDetail');
Route::post('/activity/detail/post/', 'ActivityController@saveActivityDetail');
Route::get('/activity/detail/delete/{id?}', 'ActivityController@deleteActivityDetail');

