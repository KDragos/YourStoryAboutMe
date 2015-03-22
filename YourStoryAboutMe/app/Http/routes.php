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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::get('layout', function(){
	return view('layout');
});

Route::get('profile', function (){
	return view('profile');
});

Route::get('welcome', function (){
	return view('welcomeLayout');
});

// Route::get('story', function (){
// 	return view('story');
// });


// Route::get('story', 'StoryController@allStories');

// Route::get('story/new', 'StoryController@show');
// Route::post('story', 'StoryController@store');
// Route::get('story/{id}/edit', "StoryController@edit")

// // Add the user id to this section. Right now it pulls all the stories in the database.
// Route::get('story/all', "StoryController@allStories");
// Route::get('story/{user_id}', "StoryController@userStories");

Route::resource('story', 'StoryController');
Route::resource('relationship', 'RelationshipController');
Route::resource('person', 'PersonController');