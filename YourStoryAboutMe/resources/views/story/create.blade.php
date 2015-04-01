@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/story">View Stories</a>
		<a href="/story/create">New Story</a>
		<a href="/dashboard">Edit or Delete a Story</a>			
	</div>	
@endsection

@section('main-content')
	<h1>Tell your story!</h1>
@include('errors.list')

	{!! Form::open(['url' => 'story']) !!}
		@include('story._form', ['submitButtonText' => "Tell Your Story"])
	{!! Form::close() !!}	

@endsection