<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoryRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		// Add ability to ensure that only logged in users can create new stories.
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'main_character' => "required",
			'story_text' 	 => "required",
			'created_by'	 => "required"	
		];
	}

}
