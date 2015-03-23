<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Relationship;
use Carbon\Carbon;
use DB;



class RelationshipController extends Controller {

	public function index() {
		$relationship = Relationship::all(); 
		return view('relationship.index', compact('relationship'));
	}

}
