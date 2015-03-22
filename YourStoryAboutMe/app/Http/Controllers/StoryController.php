<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoryRequest;
use App\Story;
use Carbon\Carbon;
use Request;
use DB;


class StoryController extends Controller {

	public function index() {
		// return \Auth::user()->name;  <- How to access the logged in user's name.
		$stories = Story::latest()->get();
		return view('userProfile')->with('stories', $stories);
	}

	public function create() {
		return view('story.create');
	}
	

	public function userStories($user_id) {
		// $stories = Story::all(\Auth::User()->user_id);
		$stories = Story::findOrFail($user_id)->lastest("published_at")->get();
		
		return view('userProfile')->with('stories', $stories);
	}


	/** Parameter: CreateArticleRequest $request
	 	Stores a story in the database. 
	 	Validates the required fields are filled out. 
	**/
	public function store(Requests\StoryRequest $request) {
		$input = Request::all();
		// $input['created_by'] = \Auth::user()->user_id;
		// Auth::user();
		$input['created_at'] = Carbon::now();
		$input['updated_at'] = Carbon::now();
		$story = new Story($input);
		// Story::create($input);
		Auth::author()->stories()->save($story);
		
		return redirect('story');
	}

	public function edit($story_id) {


		$story = DB::table('story')->where('story_id', '=', $story_id)->get();
		
		// dd($story);
		return view('story.edit')->with('story', $story);
	}
	
	public function show() {

	}

	public function update($story_id, StoryRequest $request) {
		$story = DB::table('story')->where('story_id', '=', $story_id)->get();
		$input = Request::Except('_method', '_token');
		$input['updated_at'] = Carbon::now();
		
		DB::table('story')
            ->where('story_id', "=", $story_id)
            ->update($input);

		return redirect('story');
	}

	public function destroy() {

	}

}
