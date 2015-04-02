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
	public function index() {
		$sqlStmt = "select story_id, story_text, published_at, created_by, 
					concat_ws(\" \", first_name, middle_name, last_name) as author 
					FROM story 
					JOIN user ON user.user_id =	story.created_by
					ORDER BY published_at DESC";
		$stories = DB::select(DB::raw($sqlStmt));	

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
		$characters =  Request::input('secondary_characters');
		if($characters == null){
			$characters = [];
		}
		array_push($characters, Request::input('main_character'));

		foreach($characters as $character) {
			if ($character == null) {
				continue;
			} else {
				$secondInput = [];
				$secondInput['story_id'] = $lastId;
				$secondInput['person_id'] = $character;
				StoryPerson::create($secondInput);				
			}
		}
		return redirect('dashboard');
	}

	// Uses route model binding to retrieve and display a single story.
	public function show(Story $story) {
		$storyId = ($story->story_id);
		$sqlStmt = "select story.story_id, story_text, story_person.person_id,
				 	concat_ws(\" \", user.first_name, user.middle_name, 
				 	user.last_name) as author, published_at, 
					concat_ws(\" \", person.first_name, person.middle_name,
					 person.last_name) as people 	
					FROM story 
					LEFT JOIN user ON user.user_id = story.created_by
					LEFT JOIN story_person ON story_person.story_id = story.story_id
					LEFT JOIN person ON person.person_id = story_person.person_id
					WHERE story.story_id = $storyId";
		$story = DB::select(DB::raw($sqlStmt));	

		return view('story.show', compact('story'));
	}

	// Uses route model binding to retrieve a story from database.
	// 	Then redirects users to a form for editing.
	public function edit(Story $story) {
		$story = Story::findOrFail($story->story_id);
		$personObject = new Person;
		$person = $personObject->getPersonList();

		return view('story.edit', compact('person', 'story'));
	}
	
	
	// Uses route model binding to retrieve a story from the database.
	// Collects and varifies information given, and updates the record in the database.
	public function update(Story $story, StoryRequest $request) {
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
	public function destroy($id) {
		$story = Story::findOrFail($id)->delete();
		$storyPerson = StoryPerson::where('story_id', '=', '$id')->delete();
		return redirect('dashboard');
	}

}
