<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Person;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller {

	public function profile() {
		$id = \Auth::id();
		$person = Person::find($id);
		$auth_id = $person->person_id;

		$stories = DB::select(DB::raw("Select 
				person.first_name, person.middle_name, person.last_name,
				person.suffix, person.birth_date, person.death_date, 
				story_text, story.created_at, 
				concat_ws(\" \", user.first_name, user.middle_name,
				user.last_name) as author 
			from story_person 
			JOIN person USING (person_id)
			JOIN story USING (story_id)
			JOIN user ON (story.created_by = user.user_id)
			WHERE person_id = \"$id\" 
			ORDER BY published_at DESC"
		));

		return view('profile', compact('stories'));
	}

	public function personProfile($id) {
		$person = Person::findOrFail($id);
		$person_id = $person->person_id;
		$stories = DB::select(DB::raw("Select * from person 
				JOIN story_person USING (person_id)
				JOIN story USING (story_id)
				WHERE person_id = \"$person_id\"
				ORDER BY published_at DESC"));	

		return view('profile', compact('stories'));
	}

	// Populates the dashboard for users to see the stories they've created.

	public function dashboard() {
		$id = \Auth::id();

		$stories = DB::select(DB::raw( "Select story.created_at, 
			story.story_text, person.first_name, 
			person.middle_name, person.last_name
			from user
			JOIN story ON user.user_id = story.created_by
			JOIN story_person USING (story_id)
			JOIN person USING (person_id)
			where user.user_id = \"$id\""));
			// "Select * from person 
			// 	JOIN story_person USING (person_id)
			// 	JOIN story USING (story_id)
			// 	WHERE person_id = \"$person_id\"
			// 	ORDER BY published_at DESC"));	


		return view('person.dashboard', compact('stories')); // return with the data needed. 
	}


}
