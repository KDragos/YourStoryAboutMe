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
		<h2>Your Dashboard</h2>
		
		@foreach($stories as $story)
		<div class="dashboard-snippet">
			<div class="controls">
				<a href="">View</a>
				<a href="">Edit</a>
				<a href="">Delete</a>
			</div>
			<h4>{{ $story->created_at }}</h4>
			<p> {{ $story->story_text}}</p>
			<h4>{{ $story->first_name }} {{$story->middle_name}} {{$story->last_name}}</h4>
		</div>
		@endforeach
		
	</div>


@stop