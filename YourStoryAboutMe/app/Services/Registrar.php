<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\Person;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data) {
		return Validator::make($data, [
			'first_name' => 'required|max:255',
			'middle_name' => 'required|max:255',
			'last_name' => 'required|max:255',
			'email' 	 => 'required|email|max:255|unique:user',
			'password'   => 'required|confirmed|min:6',
			'birth_date' => 'required|date'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data) {

		$user = User::create([
			'first_name' 	=> $data['first_name'],
			'middle_name'	=> $data['middle_name'],
			'last_name' 	=> $data['last_name'],
			'email' 		=> $data['email'],
			'password' 		=> bcrypt($data['password']),
		]);
		
		// Search db for a person that looks like the registered user. 
		// if it exists add the user_id to that person.
		// if the user doesn't exist, create a new person.
		$person = Person::firstOrCreate([
			'first_name'	=> $user['first_name'],
			'middle_name' 	=> $user['middle_name'],
			'last_name' 	=> $user['last_name'],
			'suffix' 		=> $user['suffix'],
			'birth_date' 	=> $data['birth_date'],
		]);

		// This doesn't work perfectly. It does bind a user to a person, 
		// however, it won't bind an already created person to a user.
		//  I'll want to fix this. 
		$person->user_id = $user->user_id;
		$person->save();

		return $user;

	}

}
