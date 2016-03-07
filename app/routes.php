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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/about', 'HomeController@showWelcome');

Route::post('/credit', 'SmsController@get_sms_credit');
Route::get('/pkgs', 'SmsController@get_sms_pkgs');
Route::post('/send', 'SmsController@send_sms');
Route::get('/test', 'SmsController@sms_test');
