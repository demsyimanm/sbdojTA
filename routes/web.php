<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@login');

Route::post('login','HomeController@login');

Route::group(['middleware' => 'auth'], function()
{
	/*ADMIN*/
	Route::get('assistant','HomeController@assistant');
		/*ACCOUNT*/
		Route::get('accounts','AccountController@index');
		Route::get('accounts/add','AccountController@create');
		Route::post('accounts/add','AccountController@create');
		Route::get('accounts/edit/{id}','AccountController@update');
		Route::post('accounts/edit/{id}','AccountController@update');
		Route::get('accounts/remove/{id}','AccountController@destroy');

	Route::get('logout','HomeController@logout');
});