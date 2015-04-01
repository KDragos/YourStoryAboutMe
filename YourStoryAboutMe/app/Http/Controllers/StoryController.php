<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Auth\Authenticatable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Requests\StoryRequest;
use App\Story;
use App\Person;
use App\StoryPerson;
use Carbon\Carbon;
use Request;
use DB;


class StoryController extends Controller {

	// Displays all stories.
	// ToDo: Ensure that the stories users see are related to the person's page they're on.
	//			Or they are looking at the stories they have written.
	public function index() {
		$stories = DB::select(DB::raw("select story_id, story_text, published_at, created_by, 
								concat_ws(\" \", first_name, middle_name, last_name) as author from story 
								JOIN user ON user.user_id =	story.created_by
								ORDER BY published_at DESC"));	

		return view('story.index')->with('stories', $stories);
	}

	// Sends users to a form to create a new story.
	public function create() {
		$something = new Person;
		$person = $something->getPersonList();
		return view('story.create', compact('person'));
	}
	

	// Validates we have the appropriate information and stores the data in the database.
	public function store(StoryRequest $request) {
		// Stores the story in the database.
		$input = Request::Except('_token', 'secondary_characters');
		$input['created_by'] = \Auth::id();
		$story = Story::create($input);
		
		// Stores any characters in the db. 
		$lastId = $story['story_id'];
		$characters = Request::input('secondary_characters');
		array_push($characters, Request::input('main_character'));

		foreach($characters as $character) {
			$secondInput = [];
			$secondInput['story_id'] = $lastId;
			$secondInput['person_id'] = $character;
			StoryPerson::create($secondInput);
		}
		return redirect('story');
	}

	// Uses route model binding to retrieve and display a single story.
	public function show(Story $story) {
		return view('story.show', compact('story'));
	}

	// Uses route model binding to retrieve a story from database.
	// 	Then redirects users to a form for editing.
	public function edit(Story $story) {
		$story = Story::findOrFail($story->story_id);
		$something = new Person;
		$person = $something->getPersonList();

		return view('story.edit', compact('person', 'story'));
	}
	
	
	// Uses route model binding to retrieve a story from the database.
	// Collects and varifies information given, and updates the record in the database.
	public function update(Story $story, StoryRequest $request) {
		// This is accessed via a patch request.
		$input = Request::Except('_method', '_token');
		$input['updated_at'] = Carbon::now();
		
		$story->update($input);
		$characters = Request::input('secondary_characters');
		array_push($characters, Request::input('main_character'));
		$characterQuery = DB::table('story_person')->where('story_id', '=', $story->story_id)->delete();

		foreach($characters as $character) {
			$secondInput = [];
			$secondInput['story_id'] = $story->story_id;
			$secondInput['person_id'] = $character;
			StoryPerson::create($secondInput);
		}
		return redirect('dashboard');
	}

	// Deletes the record from the database. 
	public function destroy(Story $story) {
		// We'd get here via a delete request. 
		// $story->delete();
		return redirect('dashboard');

	}

}
