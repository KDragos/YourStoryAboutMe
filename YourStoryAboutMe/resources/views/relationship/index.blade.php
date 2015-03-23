@extends('layout')

@section('main-content')
	<h1>All relationships!</h1>
	<div>
		Seach for people: <input type="text">
	</div>
	@foreach($relationship as $pair)
		<div>
			<div class="">
				{{ $pair->person_id1 }} 
			</div> 
			<div class="">
				<h3>is connected by {{ $pair->relationship }} to </h3>
			</div>
			<div class="">
				{{ $pair->person_id2 }} 
			</div> 
		</div>
	@endforeach
@stop