<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\RelationshipRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Relationship;
use App\Person;
use Carbon\Carbon;
use DB;



class RelationshipController extends Controller {

	public function index() {
		$relationship = Relationship::all();
		// $attempt = DB::table('relationship')
		// 	->join('person', 'relationship.person_id1', '=', 'person.person_id')
		// 	->get();
		// dd($attempt);
		return view('relationship.index', compact('relationship'));
	}

	public function create() {
		// Get all people from the database. This will populate the dropdowns.
		$person = Person::orderBy('last_name')->get();

		return view('relationship.create')->with('people', $person);
	}

	// Stores the relationship's data in the database.
	public function store(RelationshipRequest $request) {
		$input = Request::Except('_token');
		
		$first = explode(" ", $input['person_id1']);
		$person1 = Person::where(
			'first_name', '=', $first[0])
			->where('middle_name', '=', $first[1])
			->where('last_name', '=', $first[2])->get()->toArray();
		
		$second = explode(" ", $input['person_id2']);
		$person2 = Person::where(
			'first_name', '=', $second[0])
			->where('middle_name', '=', $second[1])
			->where('last_name', '=', $second[2])->get()->toArray();

		$relationship = [];
		$relationship['person_id1'] = $person1[0]['person_id'];
		$relationship['person_id2'] = $person2[0]['person_id'];
		$relationship['relationship'] = $input['relationship'];

		// dd($relationship);
		
		Relationship::create([
			'person_id1' => $relationship['person_id1'],
			'person_id2' => $relationship['person_id2'],
			'relationship' => $relationship['relationship'],
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
			]);
		
		return redirect('relationship');
	}




}
