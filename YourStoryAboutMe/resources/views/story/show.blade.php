@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/story">View Stories</a>
		<a href="/story/create">New Story</a>
		<a href="/dashboard">Edit or Delete a Story</a>			
	</div>	
@endsection

@section('main-content')
	<h1>Show one story.</h1>
	<div class="story">
		{{ $story[0]->story_text}}
	</div>
	<div class="author-details">
		{{-- <img src=" image for user would go here. " alt=""> --}}
		<div> Created By: {{ $story[0]->author }} </div>
		<p> Created On: {{ $story[0]->published_at }} </p>			
	</div>
	@unless($story[0]->people == null)
		<div>
			<h3>People in this story:</h3>
			<ul>
				@foreach($story as $singleStory)
					<li> {{ $singleStory->people }} </li>		
				@endforeach
			</ul>
		</div>
	@endunless
@stop