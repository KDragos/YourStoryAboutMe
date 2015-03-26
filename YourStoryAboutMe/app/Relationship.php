<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Relationship extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'relationship';
	protected $primaryKey = 'relationship_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['relationship', 'updated_at', 'person_id1', 'person_id2'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $guarded = ['person_id1', 'person_id2'];

}

