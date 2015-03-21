<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Story extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'story';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['story_text', 'primary_character', 'seconary_characters', 'published_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['story_id', 'created_by'];

}
