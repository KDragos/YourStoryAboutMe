<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Requests\PersonRequest;
use App\Person;
use Carbon\Carbon;
use Request;
use DB;

class PersonController extends Controller {

	// Gathers and displays all persons in the database.
	// 		Note: This is NOT the same as users.
	public function index() {
		$person = Person::orderBy('last_name')->get();
		return view('person.index', compact('person'));
	}

	// Displays the details of a specific person.
	public function show(Person $person) {
		return view('person.show', compact('person'));
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
		
		if ($livingStatus) {
			$input['death_date'] = NULL;
		}

		$person = Person::firstOrCreate($input);

		return redirect('person');
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
