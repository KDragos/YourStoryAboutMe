<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ChallengeController extends Controller {

	public function index() {
		$challenge = Challenge::all(); 
		return view('challenge.index', compact('challenge'));
	}

	

}
