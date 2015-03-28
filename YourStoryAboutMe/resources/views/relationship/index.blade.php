@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/relationship">View Relationships</a>
		<a href="/relationship/create">New Connection</a>
		<a href="">Edit a Connection</a>
		<a href="">Delete a Connection</a>			
	</div>	
@endsection

@section('main-content')
	<h1>All relationships!</h1>
	<div>
		Seach for people: <input type="text">
	</div>
	@foreach($relationship as $pair)
		<div class="container js-masonry">

			<div class="">
				{{ $pair->person_id1 }} 
				is connected by {{ $pair->relationship }} to
				{{ $pair->person_id2 }} 
			</div> 

		</div>
	@endforeach
@stop