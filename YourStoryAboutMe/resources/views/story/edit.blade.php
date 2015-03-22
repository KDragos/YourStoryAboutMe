@extends('layout')

@section('main-content')
	<h1>Edit a story.</h1>
@include('errors.list')

	{!! Form::model($story[0], ["method"=> "PATCH", 'url' => 'story/' . $story[0]->story_id]) !!}
		@include ('story._form', ['submitButtonText' => "Update Story"])
	{!! Form::close() !!}	
@stop