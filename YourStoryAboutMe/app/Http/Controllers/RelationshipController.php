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
		$something = new Person;
		$person = $something->getPersonList();
		return view('relationship.create', compact('person'));
	}

	// Stores the relationship's data in the database.
	public function store(RelationshipRequest $request) {
		$input = Request::Except('_token');
		Relationship::create($input);
				
		return redirect('relationship');
	}




}
