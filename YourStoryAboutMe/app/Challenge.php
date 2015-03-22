<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Challenge extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'challenge';
	protected $primaryKey = 'challenge_id';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['story_text', 'updated_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['story_id', 'created_by', 'challenge_id'];

}
