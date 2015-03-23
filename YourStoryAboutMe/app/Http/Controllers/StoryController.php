<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Requests\StoryRequest;
use App\Story;
use Carbon\Carbon;
use Request;
use DB;


class StoryController extends Controller {

	// Displays all stories.
	// ToDo: Ensure that the stories users see are related to the person's page they're on.
	//			Or they are looking at the stories they have written.
	public function index() {
		// \Auth::user()->name;  <- How to access the logged in user's name.
		$stories = Story::latest()->get();
		return view('userProfile')->with('stories', $stories);
	}

	// Sends users to a form to create a new story.
	public function create() {
		return view('story.create');
	}
	

	// public function userStories($user_id) {
	// 	// $stories = Story::all(\Auth::User()->user_id);
	// 	$stories = Story::findOrFail($user_id)->lastest("published_at")->get();
		
	// 	return view('userProfile')->with('stories', $stories);
	// }


	// Validates we have the appropriate information and stores the data in the database.
	public function store(StoryRequest $request) {
		$input = Request::all();
		$input['created_by'] = \Auth::id();
		$input['created_at'] = Carbon::now();
		$input['updated_at'] = Carbon::now();
		$story = new Story($input);
		Story::create($input);
		\Auth::user()->stories()->save($story);
		
		return redirect('story');
	}

	// Retrieves and displays a single story.
	public function show($id) {
		$story = Story::findOrFail($id);
		return view('story.show', compact('story'));
	}

	// Retrieves a story from the database and redirects users to a form for editing.
	public function edit($story_id) {
		$story = DB::table('story')->where('story_id', '=', $story_id)->get();
		return view('story.edit')->with('story', $story);
	}
	
	
	// Collects and varifies information give, and updates the record in the database.
	public function update($story_id, StoryRequest $request) {
		$story = DB::table('story')->where('story_id', '=', $story_id)->get();
		$input = Request::Except('_method', '_token');
		$input['updated_at'] = Carbon::now();
		
		DB::table('story')->where('story_id', "=", $story_id)->update($input);

		return redirect('story');
	}

	// Deletes the record from the database. 
	public function destroy() {
		// $story = Story::find();

		// $story->delete();
	}

}
