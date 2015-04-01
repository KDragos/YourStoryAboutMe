@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/story">View Stories</a>
		<a href="/story/create">New Story</a>
		<a href="/dashboard">Edit or Delete a Story</a>			
	</div>	
@endsection

@section('main-content')

	<div class="story-container js-masonry">
		@foreach ($stories as $story)
			<div class="snippet">
				<p class="story">{{ $story->story_text }}</p>
				<div class="author-details">
					<img src="images/logotree.png" alt="">
					<a href="{{ action('StoryController@show', [$story->story_id]) }}">More...</a>
					<a href="{{ action('PersonController@show', [$story->created_by]) }}" >{{ $story->author }}</a>
					<p>{{ $story->published_at }}</p>				
				</div>
			</div>
		@endforeach
	</div>

@endsection

