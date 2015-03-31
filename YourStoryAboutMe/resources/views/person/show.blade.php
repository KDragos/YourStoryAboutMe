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
	<h1>
		{{ $stories[0]->first_name}} {{ $stories[0]->middle_name}} {{$stories[0]->last_name}} {{$stories[0]->suffix}}
	</h1>
	<div class="author-details">
		{{ $stories[0]->birth_date }} - {{ $stories[0]->death_date }}
		{{-- <img src=" image for user would go here somewhere. " alt=""> --}}
	</div>
	<div>
		<h2>View {{$stories[0]->first_name}}'s Stories</h2>				
		{{-- <div> Stories where this person is either a primary or secondary
					 character will be put here. These will be displayed using
					 masonry.  </div> --}}
		<div class="story-container js-masonry">
			@if( ! empty($stories) )
				@foreach($stories as $story)
					<div class="snippet">
						<p class="story"> {{ $story->story_text }}</p>
						<div class="author-details">
							<img src="/images/logotree.png" alt="">
							<a href="">More...</a>
							<a href="">{{ $story->author }}</a>
							<p>{{ $story->created_at}}</p>				
						</div>
					</div>
				@endforeach
			@else
				<div>
					No one is telling any stories about {{ $stories->first_name }} yet. Check back soon!
				</div>
			@endif
		</div>
	</div>
@stop