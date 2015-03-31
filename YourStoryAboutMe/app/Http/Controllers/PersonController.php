<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Requests\PersonRequest;
use App\Person;
use App\UserController;
use Carbon\Carbon;
use Request;
use DB;

class PersonController extends Controller {

	// Gathers and displays all persons in the database.
	// 		Note: This is NOT the same as users.
	public function index() {
		$person = Person::orderBy('last_name')->get();
		return view('person.index')->with('person', $person);
	}

	// Displays the details of a specific person.
	public function show(Person $person) {
		$id = $person->person_id;

		// $person = Person::findOrFail($id);
		// $person_id = $person->person_id;
		$stories = DB::select(DB::raw("Select * from person 
				JOIN story_person USING (person_id)
				JOIN story USING (story_id)
				WHERE person_id = \"$id\"
				ORDER BY published_at DESC"));	

		return view('person.show', compact('person', 'stories'));
	}

	// Sends users to a form to create a new person.
	public function create() {
		return view('person.create');
	}

	// Stores the person's data in the database.
	public function store(PersonRequest $request) {
		$livingStatus = Request::input('is_alive');
		$input = Request::Except('_token', 'is_alive');
		$input['created_at'] = Carbon::now();
		$input['updated_at'] = Carbon::now();
		
		// Sets the death date to be formatted correctly for the DB.
		if ($livingStatus) {
			$input['death_date'] = NULL;
		}

		// Checks to see if the person already exists in the database.
		// Uses the first, middle and last names. 
		$check = Person::where(
			'first_name', '=', $input['first_name'])
			->where('middle_name', '=', $input['middle_name'])
			->where('last_name', '=', $input['last_name'])->get();
		$justArray = array_flatten($check);

		// Either creates a new person, or redirects the users back with a message.
		// ToDo: The messages aren't working for either one. 
		// I'll need to fix these to improve user experience.
		if ($justArray) {
			\Session::flash('flash_message_important', "This person already exists.");
			// flash("This person already exists.")->important();
			// \Flash::error("This person already exists.");
			return redirect('person');
		} else {
			Person::create($input);
			\Session::flash('flash_message', "You've successfully added someone!");
			// \Flash::success("You've successfully added someone!");
			return redirect('person');
		}
	}

	// Retrieves a person from the database and redirects users to a form for editing.
	// ToDo: Add functionality to see if the person has been claimed by a specific user. 
	// 		If it's been claimed then other users should be prevented from editing. 
	//		To avoid abandoned persons due to death the ability to submit a "suggested update"
	//		might be possible. Perhaps if "suggested updates" are 30 days without being 
	// 		changed/declined by the original user, then the change takes effect.
	public function edit(Person $person) {
		return view('person.edit')->with('person', $person);
	}

	// Collects and varifies information give, and updates the record in the database.
	public function update(Person $person, PersonRequest $request) {
		// $person = DB::table('person')->where('person_id', '=', $person_id)->get();
		$input = Request::Except('_method', '_token');
		$input['updated_at'] = Carbon::now();
		if($input['is_alive']) {
			$input['death_date'] = NULL;
		}
		// DB::table('person')->where('person_id', "=", $person_id)->update($input);
		$person->update($input);
		return redirect('person');
	}


}
