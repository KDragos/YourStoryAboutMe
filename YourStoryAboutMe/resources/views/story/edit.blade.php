@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/story">View Stories</a>
		<a href="/story/create">New Story</a>
		<a href="/dashboard">Edit or Delete a Story</a>			
	</div>	
@endsection

@section('main-content')
	<h1>Edit a story.</h1>
@include('errors.list')

	{!! Form::model($story, ["method"=> "PATCH", 'url' => 'story/' . $story->story_id]) !!}
		@include ('story._form', ['submitButtonText' => "Update Story"])
	{!! Form::close() !!}	
@endsection