<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Story extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'story';
	protected $primaryKey = 'story_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'created_by',
			 'story_text', 'main_character',
			 'seconary_characters', 'published_at',
			 "created_at", "updated_at"];
	/**
	 * The attributes using Carbon.
	 *
	 * @var array
	 */
	protected $dates = ["published_at", "updated_at", "created_at"];



	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['story_id', 'created_by'];

	/**
	 * The relationships to other tables.
	 *
	 * 
	 */
	// A story is created by one user.
	public function created_by() {
        return $this->hasOne('App\User');
    }


    // A story is written by one user.
    // Can be accessed by $story->author
    public function author() {
    	return $this->belongsTo('App\User');
    }

    // A story can be written about more than one person.
    // Can be accessed by $story->characters
    public function characters() {
    	return $this->hasMany('App\Person');
    }
   
    public function scopePublished($query) {
    	$query->where('published_at', '<=', Carbon::now());
    }

}
