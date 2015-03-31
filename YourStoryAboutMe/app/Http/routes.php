<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){
	// If not logged in.
	return view('welcomeLayout');
	// If users are logged in, go to the profile page.
});

// Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('profile', 'UserController@profile');
Route::get('profile/{id}', 'UserController@personProfile');
Route::get('layout', function(){
	return view('layout');
});
Route::get('welcome', function (){
	return view('welcomeLayout');
});


Route::resource('story', 'StoryController');
Route::resource('relationship', 'RelationshipController');
Route::resource('person', 'PersonController');
Route::resource('challenge', 'ChallengeController');


Route::get('family', function(){
	return view('family');
});

Route::get('dashboard', 'UserController@dashboard');

Route::get('api/relations/{id}', 'APIController@getAllRels');
Route::get('api/chars/{id}', 'APIController@getCharacters');
Route::get('api/author/{id}', 'APIController@getAuthor');
Route::get('api/{id}', 'APIController@show');