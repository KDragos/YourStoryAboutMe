@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="/family">Your Family</a>
		<a href="/relationship">View Relationships</a>
		<a href="/relationship/create">New Connection</a>
		<a href="">Edit a Connection</a>		
	</div>	
@endsection

@section('main-content')
<h1>Your Connections</h1>
<div class="canvas-wrapper">
<canvas id="viewport" width="800" height="600"></canvas>
</div>

@stop