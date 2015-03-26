@extends('layout')

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