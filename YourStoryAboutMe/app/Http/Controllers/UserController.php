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

		$stories = DB::select(DB::raw("Select * from person 
				JOIN story_person USING (person_id)
				JOIN story USING (story_id)
				WHERE user_id = $auth_id
				ORDER BY published_at DESC"));	

		return view('profile', compact('stories'));
	}

	public function personProfile($id) {

		// $person = Person::find($id);
		// $person = Person::where('person_id', '=', $id);
		$person = Person::findOrFail($id);
		$person_id = $person->person_id;
		$stories = DB::select(DB::raw("Select * from person 
				JOIN story_person USING (person_id)
				JOIN story USING (story_id)
				WHERE person_id = \"$person_id\"
				ORDER BY published_at DESC"));	

		return view('profile', compact('stories'));
	}



}
