@extends('layout')

@section('main-content')
	<h1>Edit a person.</h1>
@include('errors.list')

	{!! Form::model($person[0], ["method"=> "PATCH", 'url' => 'person/' . $person[0]->person_id]) !!}
		@include ('person._form', ['submitButtonText' => "Update this person's details"])
	{!! Form::close() !!}	
@stop