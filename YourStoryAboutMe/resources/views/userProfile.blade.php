@extends('layout')

@section('main-content')
	<div class="story-nav">
		<a href="">Highlighted</a>
		<a href="">Recent</a>
		<a href="">Group By Year</a>
		<a href="">Connect</a>			
	</div>
	<div class="story-container js-masonry">
		@foreach ($stories as $story)
			<div class="snippet">
				<p>{{ $story->story_text }}</p>
				<div class="author-details">
					<img src="images/logotree.png" alt="">
					<a href="{{ action('StoryController@show', [$story->story_id]) }}">More...</a>
					<a href="">{{ $story->created_by }}</a>
					<p>{{ $story->published_at }}</p>				
				</div>
			</div>
		@endforeach
	</div>

@endsection

