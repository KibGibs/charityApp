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
