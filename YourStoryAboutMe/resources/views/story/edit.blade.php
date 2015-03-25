@extends('layout')

@section('main-content')
	<h1>Edit a story.</h1>
@include('errors.list')

	{!! Form::model($story, ["method"=> "PATCH", 'url' => 'story/' . $story->story_id]) !!}
		@include ('story._form', ['submitButtonText' => "Update Story"])
	{!! Form::close() !!}	
@stop