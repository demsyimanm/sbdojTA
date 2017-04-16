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
Route::get('login', function () {
    return redirect('/');
});


Route::post('login','HomeController@login');

/*RESET PASSWORD*/
Route::get('reset/password','AccountController@resetPassword');
Route::post('reset/password','AccountController@resetPassword');
Route::get('reset/password/verification','AccountController@verification');
Route::post('reset/password/verification','AccountController@verification');

Route::get('foo', function () {
    return 'Hello World';
});

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
		Route::post('upload/praktikan','AccountController@upload');

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

		/*DATABASE*/
		Route::get('databases','DatabaseController@index');
		Route::get('databases/add','DatabaseController@create');
		Route::post('databases/add','DatabaseController@create');
		Route::get('databases/edit/{id}','DatabaseController@update');
		Route::post('databases/edit/{id}','DatabaseController@update');
		Route::get('databases/remove/{id}','DatabaseController@destroy');
		Route::get('databases/field/{id}','DatabaseController@getField');

		/*PARSER*/
		Route::get('event/parser/start/{id}', 'EventController@parserStart');
		Route::get('event/parser/stop/{id}', 'EventController@parserStop');

		/*PARSER TUTORIAL*/
		Route::get('tutorial/parser/start/{id}', 'EventTutorialController@parserStart');
		Route::get('tutorial/parser/stop/{id}', 'EventTutorialController@parserStop');

		/*TUTORIAL*/
		Route::get('tutorial','EventTutorialController@index');
		Route::get('tutorial/add','EventTutorialController@create');
		Route::post('tutorial/add','EventTutorialController@create');
		Route::get('tutorial/edit/{id}','EventTutorialController@update');
		Route::post('tutorial/edit/{id}','EventTutorialController@update');
		Route::get('tutorial/remove/{id}','EventTutorialController@destroy');
			/*QUESTION*/
			Route::get('tutorial/questions/manage/{id}','TutorialController@index');
			Route::get('tutorial/questions/add/{id}','TutorialController@create');
			Route::post('tutorial/questions/add/{id}','TutorialController@create');
			Route::get('tutorial/questions/edit/{id1}/{id2}','TutorialController@update');
			Route::post('tutorial/questions/edit/{id1}/{id2}','TutorialController@update');
			Route::get('tutorial/questions/remove/{id1}/{id2}','TutorialController@destroy');
			/*CATEGORY*/
			Route::get('categories/add','CategoryController@create');
			Route::post('categories/add','CategoryController@create');
			Route::get('categories/edit/{id}','CategoryController@update');
			Route::post('categories/edit/{id}','CategoryController@update');
			Route::get('categories/remove/{id}','CategoryController@destroy');
			/*SUBMISSION*/
			Route::post('tutorial/submissions', 'EventTutorialController@viewSubmissions');
			Route::get('tutorial/submissions/{id}', 'EventTutorialController@viewSubmissionsTutorialSubmit');

		/*DBVERSION*/
		Route::get('databases/version','DBVersionController@index');
		Route::get('databases/version/add','DBVersionController@create');
		Route::post('databases/version/add','DBVersionController@create');
		Route::get('databases/version/edit/{id}','DBVersionController@update');
		Route::post('databases/version/edit/{id}','DBVersionController@update');




	/*USER*/
	Route::get('user','HomeController@user');
		/*EVENT*/
		Route::get('events','EventController@index');
		Route::get('questions/{id}','QuestionController@index');
		Route::post('question/{id1}/submit/{id2}', array('before' => 'csrf', 'uses' => 'QuestionController@submit'));

		/*TUTORIAL*/
		Route::get('categories','CategoryController@index');
		Route::get('tutorial/manage/{id}','TutorialController@index');
		Route::post('tutorial/{id1}/submit/{id2}', array('before' => 'csrf', 'uses' => 'TutorialController@submit'));

		/*PROFILE*/
		Route::get('profile','AccountController@profile');
		Route::post('profile','AccountController@profile');
		Route::post('auth/password','AccountController@passwordResetAuth');


	/*SCOREBOARD*/
	Route::get('scoreboards', 'AdminController@scoreboards');
	Route::post('scoreboards', 'AdminController@scoreboards');
	Route::get('scoreboards/{id}', 'AdminController@scoreboardView');

	Route::get('logout','HomeController@logout');
});