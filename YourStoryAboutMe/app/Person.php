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
				 		   'death_date', 'user_id'];


	protected $guarded = ['person_id'];

	public function getPersonList() {
		$allPeople = $this->all();
		$personList = [];
		foreach($allPeople as $person) {
			// echo $person->first_name . "something" ;

			$wholeName = $person->first_name . " " . $person->middle_name . " " . $person->last_name;
			// $person_id = $person['person_id'];
			$personList[$person->person_id] = $wholeName;
		}
		return $personList;
	}


	public function owner() {
    	return $this->hasOne('App\User');
    }
	
	public function stories() {
    	return $this->belongsToMany('App\Story');
    }

	public function relatives() {
    	return $this->hasMany('App\Relationship');
    }

}
