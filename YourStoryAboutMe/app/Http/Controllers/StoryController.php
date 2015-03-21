<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Story;

use Illuminate\Http\Request;

class StoryController extends Controller {

	public function allStories() {
		$stories = Story::all();
		return view('userProfile')->with('stories', $stories);
	}

	public function userStories($user_id) {
		// $stories = Story::all(\Auth::User()->user_id);
		$stories = Story::findOrFail($user_id);
		
		return view('userProfile')->with('stories', $stories);

	}

	public function newStory() {

	}

	public function updateStory() {

	}
	
	public function deleteStory() {

	}
}
