<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'person';
	protected $primaryKey = 'person_id';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name', 'middle_name',	
				 		   'last_name', 'suffix', 'birth_date',
				 		   'death_date'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['user_id', 'person_id'];


	public function owner() {
    	return $this->belongsTo('App\User');
    }
	
	public function stories() {
    	return $this->hasMany('App\Story');
    }

	public function relatives() {
    	return $this->hasMany('App\Relationship');
    }

}
