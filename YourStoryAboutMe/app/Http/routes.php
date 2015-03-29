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
	return view('welcome');
	// If users are logged in, go to the profile page.
});

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('profile', function (){
	// This will eventually go to a user controller that will send them to a user profile
	// 		where users can see the stories about them, click a link to see stories they've
	//		written, connections, search for other people. 
	return view('profile');
});

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

// Routes to claim a person. 
Route::get('person/{id}/claim', 'PersonController@claim');
Route::post('person/{id}/claim', 'PersonController@processClaim');

Route::get('family', function(){
	return view('family');
});

Route::get('api/relations/{id}', 'APIController@getAllRels');
Route::get('api/chars/{id}', 'APIController@getCharacters');
Route::get('api/author/{id}', 'APIController@getAuthor');
Route::get('api/{id}', 'APIController@show');