@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="/profile">Stories About Me</a>
		<a href="/dashboard">My Stories</a>
		<a href="/story/create">Write a New Story</a>
		<a href="">My Connections</a>
	</div>	
@endsection

@section('main-content')
	<div class="dashboard">
		<h2>Story Dashboard</h2>
		
		@foreach($allStories as $story)
		<div class="dashboard-snippet">
			<div class="controls">
				<a href="story/{{$story['id']}}">View</a>
				<a href="story/{{$story['id']}}/edit">Edit</a>
				<a href="story/{{$story['id']}}/destroy">Delete</a>
			</div>
			<h4>Created At: {{ $story['created_at'] }}</h4>
			<p> {{ $story['text']}}</p>
			<h4>People in this story:</h4>
			<ul>
				@foreach($story['characters'] as $character)
				<li>{{ $character }}</li>
				@endforeach
			</ul>
		</div>
		@endforeach
		
	</div>


@stop