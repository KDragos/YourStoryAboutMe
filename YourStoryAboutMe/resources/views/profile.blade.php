@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="/story">My Stories</a>
		<a href="/story/create">Write a New Story</a>
		<a href="">My Connections</a>
	</div>	
@endsection

@section('main-content')

	<div class="story-container js-masonry">
		@if( ! empty($stories) )
			@foreach($stories as $story)
				<div class="snippet">
					<p class="story"> {{ $story->story_text }}</p>
					<div class="author-details">
						<img src="images/logotree.png" alt="">
						<a href="">More...</a>
						<a href="">{{ $story->created_by }}</a>
						<p>{{ $story->created_at}}</p>				
					</div>
				</div>
			@endforeach
		@else
			<div>
				No one is telling any stories about you yet. Check back soon!
			</div>
		@endif
	</div>

@endsection

