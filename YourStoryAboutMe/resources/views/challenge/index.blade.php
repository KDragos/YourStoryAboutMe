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
	<h1>All Additions!</h1>
	@foreach($challenges as $challenge)
		<div>
			<div class="name">
				Created By: {{ $challenge->created_by }} 
			</div> 
			<div class="dates">
				<h3>The way I remember it...</h3>
				{{ $challenge->story_text }}
			</div>
		</div>
	@endforeach
@stop