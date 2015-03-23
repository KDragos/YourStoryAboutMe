@extends('layout')

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