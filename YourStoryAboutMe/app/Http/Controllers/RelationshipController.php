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
		dd($input);
		$input['created_at'] = Carbon::now();
		$input['updated_at'] = Carbon::now();
		$relationship = Relationship::firstOrCreate($input);
		$relationship->save();
		// $relationship->create($input);
		// Relationship::firstOrCreate($input);
		
		return redirect('relationship');

		// Story Cont.
		// $input = Request::all();
		// $input['created_by'] = \Auth::id();
		// $input['created_at'] = Carbon::now();
		// $input['updated_at'] = Carbon::now();
		// $story = new Story($input);
		// Story::create($input);
		// \Auth::user()->stories()->save($story);

		// Person Cont. 
		// $livingStatus = Request::input('is_alive');
		// $input = Request::Except('_token', 'is_alive');
		// $input['created_at'] = Carbon::now();
		// $input['updated_at'] = Carbon::now();
		
		// if ($livingStatus) {
		// 	$input['death_date'] = NULL;
		// }

		// $person = Person::firstOrCreate($input);

		// return redirect('person');
	}

	// public function update(Relationship $relationship, RelationshipRequest $request) {
	// 	// $relationship = DB::table('relationship')->where('relationship_id', '=', $relationship_id)->get();
	// 	$input = Request::Except('_method', '_token');
	// 	$input['updated_at'] = Carbon::now();

	// 	// DB::table('relationship')->where('relationship_id', "=", $relationship_id)->update($input);
	// 	$relationship->update($input);
	// 	return redirect('relationship');
	// }



}
