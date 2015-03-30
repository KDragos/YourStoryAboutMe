<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class StoryPerson extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'story_person';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'story_id','person_id'];
	/**
	 * The attributes using Carbon.
	 *
	 * @var array
	 */
	public $timestamps = false;

	public function getStory() {
    	return $this->belongsTo('App\story');
    }

}
