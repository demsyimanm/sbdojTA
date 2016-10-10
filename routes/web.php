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
Route::get('login','HomeController@login');

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

		/*EVENT*/
		Route::get('events','EventController@index');
		Route::get('events/add','EventController@create');
		Route::post('events/add','EventController@create');
		Route::get('events/edit/{id}','EventController@update');
		Route::post('events/edit/{id}','EventController@update');
		Route::get('events/remove/{id}','EventController@destroy');

		/*QUESTION*/
		Route::get('questions/{id}','QuestionController@index');
		Route::get('questions/add/{id}','QuestionController@create');
		Route::post('questions/add/{id}','QuestionController@create');
		Route::get('questions/edit/{id1}/{id2}','QuestionController@update');
		Route::post('questions/edit/{id1}/{id2}','QuestionController@update');
		Route::get('questions/remove/{id1}/{id2}','QuestionController@destroy');

		/*SUBMISSION*/
		Route::get('submissions', 'EventController@viewSubmissions');
		Route::post('submissions', 'EventController@viewSubmissions');
		Route::get('submissions/{id}', 'EventController@viewSubmissionsSubmit');

		/*PARSER*/
		Route::get('event/parser/start/{id}', 'EventController@parserStart');
		Route::get('event/parser/stop/{id}', 'EventController@parserStop');



	/*USER*/
	Route::get('user','HomeController@user');
		/*EVENT*/
		Route::get('events','EventController@index');
		Route::get('questions/{id}','QuestionController@index');
		Route::post('question/{id1}/submit/{id2}', array('before' => 'csrf', 'uses' => 'QuestionController@submit'));

	/*SCOREBOARD*/
	Route::get('scoreboards', 'AdminController@scoreboards');
	Route::post('scoreboards', 'AdminController@scoreboards');
	Route::get('scoreboards/{id}', 'AdminController@scoreboardView');

	Route::get('logout','HomeController@logout');
});