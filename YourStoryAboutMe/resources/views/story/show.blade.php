@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/story">View Stories</a>
		<a href="/story/create">New Story</a>
		<a href="">Edit a Story</a>
		<a href="">Delete a Story</a>			
	</div>	
@endsection

@section('main-content')
	<h1>Show one story.</h1>
	<div class="story">
		{{ $story->story_text}}
	</div>
	<div class="author-details">
		{{-- <img src=" image for user would go here. " alt=""> --}}
		<div>Created By: {{ $story->created_by }} </div>
		<p>Created On: {{ $story->created_at }}</p>				
	</div>
@stop