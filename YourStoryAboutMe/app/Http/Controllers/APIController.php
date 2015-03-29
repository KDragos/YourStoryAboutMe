<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Relationship;
use App\Story;
use App\Person;

class APIController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		return $this->getRelations($id, 0);
	
	}

	private function getRelations($id, $depth){
		if($depth > 10){
			return [];
		}

		// This will need to be moved to a model. 
		$relations = DB::select(
			'Select person_id1, person_id2, relationship, 
			person_id, first_name, middle_name, last_name from relationship
			join person on relationship.person_id1 = person.person_id 
			or relationship.person_id2 = person.person_id
			WHERE person_id = :id
			Order By person_id', [':id' => $id]);

		$start = [
			'person_id' => $relations[0]->person_id,
			'first_name' => $relations[0]->first_name,
			'middle_name' => $relations[0]->middle_name,
			'last_name' => $relations[0]->last_name,
			'relations' => []
		];
		// dd($relations);
		foreach($relations as $relation) {
			if ( $relation->person_id1 == $id) {
				$newRelation = $this->getRelations($relation->person_id2, ++$depth);
				array_push($start['relations'], $newRelation);
			} else {
				$newRelation = $this->getRelations($relation->person_id1, ++$depth);
				array_push($start['relations'], $newRelation);
			}
		}
		return $start;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getAllRels($id) {
		$start = Person::findOrFail($id);
		dd($start->relatives());
		return $start->relatives();
	}

	public function getCharacters($id) {
		$start = Story::findOrFail($id);
		dd($start->characters());
	}

	public function getAuthor($id) {
		$start = Story::findOrFail($id);
		dd($start->author());
	}



}
