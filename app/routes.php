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

/* Reports */
Route::get('/reports/donor', 'Reports@getDonors');
Route::get('/reports/donor/{program?}', 'Reports@getDonation');
Route::get('/reports/program', 'Reports@getProgramReport');
Route::get('/reports/program_summary', 'Reports@getProgramSummary');
Route::get('/reports/program/{program?}', 'Reports@getActivity');
Route::get('/reports/summary/{program?}', 'Reports@getSummary');


/* Posting */
Route::get('/post', 'PostingController@getIndex');
Route::get('/post/add/{post?}', 'PostingController@postAddIndex');
Route::post('/post/add/post', 'PostingController@savePost');
Route::get('/post/delete/{post?}', 'PostingController@delete');

/* Users */
Route::get('/users', 'HomeController@users');
Route::get('/users/add', 'HomeController@addUser');
Route::post('/users/register/', 'HomeController@register');
Route::get('/users/edit/{id}', 'HomeController@editUser');
Route::post('/users/update/{id}', 'HomeController@update');

/* Program */
Route::get('/program', 'ProgramController@getIndex');
Route::get('/program/toggle/{id?}', 'ProgramController@getToggleStatus');
Route::get('/program/add/{program?}', 'ProgramController@programAddIndex');
Route::get('/program/delete/{program?}', 'ProgramController@delete');
Route::post('/program/add/post', 'ProgramController@saveProgram');
Route::get('/program/detail/{program?}', 'ProgramController@getProgramDetail');
Route::get('/program/detail/add/{program?}', 'ProgramController@addProgramDetail');
Route::get('/program/subactivity/get/{program?}', 'ProgramController@getSubActivity');
Route::post('/program/post', 'ProgramController@postProgramDetail');
Route::get('/program/detail/delete/{program?}/{detail?}', 'ProgramController@deleteDetail');
Route::get('/program/donations/{detail?}', 'ProgramController@viewDonations');
Route::get('/program/pdf/{program?}', 'ProgramController@printPDF');
Route::get('/program/pdf2/{program?}', 'ProgramController@printPDF2');

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

Route::get('/activity/toggle/{id?}', 'ActivityController@getToggleStatus');

Route::get('/activity/sub/{subactivity?}', 'ActivityController@getIndexSubActivity');
Route::get('/activity/sub/delete/{subactivity?}', 'ActivityController@deleteSubActivity');
Route::post('/activity/sub/save/', 'ActivityController@saveSubActivity');

Route::get('/activity/detail/{activity?}/', 'ActivityController@getActivityDetail');
Route::post('/activity/detail/post/', 'ActivityController@saveActivityDetail');
Route::get('/activity/detail/delete/{id?}', 'ActivityController@deleteActivityDetail');

/* Donation */
Route::get('/donation', 'DonationController@getIndex');
Route::get('/donation/donate', 'DonationController@donate');
Route::get('/donation/donate/paypal/index', 'DonationController@donateViaPaypal');
Route::post('/donation/donate/paypal', 'DonationController@paypalDonate');
Route::get('/donation/donate/paypal/{amount?}/{date?}/{remarks?}', 'DonationController@paypalReturn');
Route::get('/donation/donate/paypal/cancel', 'DonationController@paypalCancel');
Route::get('/donation/donate/{donate?}', 'DonationController@donationDetail');
Route::get('/donation/received/{donate?}', 'DonationController@received');
Route::get('/donation/donate/delete/{donate?}/{detail?}', 'DonationController@deleteDetail');
Route::post('/donate/post/detail', 'DonationController@postDonateDetail');
Route::post('/donate/post', 'DonationController@postDonate');
