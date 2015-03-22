<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {

	public function index() {
		$person = Person::all(); 
		return view('person.index', compact('person'));
	}

	public function show($id) {
		return $id;
	}

}
