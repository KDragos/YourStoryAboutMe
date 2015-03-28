@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="api/{{\Auth::id}}">Your Family</a>
		<a href="/relationship">View Relationships</a>
		<a href="/relationship/create">New Connection</a>
		<a href="">Edit a Connection</a>		
	</div>	
@endsection