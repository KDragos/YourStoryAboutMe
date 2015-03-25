@extends('layout')

@section('main-content')
	<h1>Edit a person.</h1>
@include('errors.list')

	{!! Form::model($person, ["method"=> "PATCH", 'url' => 'person/' . $person->person_id]) !!}
		@include ('person._form', ['submitButtonText' => "Update this person's details"])
	{!! Form::close() !!}	
@stop