@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/person">People</a>
		<a href="/person/create">New Person</a>
		<a href="">Edit a Person</a>
		<a href="">Delete a Person</a>			
	</div>	
@endsection

@section('main-content')
	<h1>Edit a person.</h1>
@include('errors.list')

	{!! Form::model($person, ["method"=> "PATCH", 'url' => 'person/' . $person->person_id]) !!}
		@include ('person._form', ['submitButtonText' => "Update this person's details"])
	{!! Form::close() !!}	
@stop