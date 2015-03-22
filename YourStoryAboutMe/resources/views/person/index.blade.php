@extends('layout')

@section('main-content')
	<h1>All people!</h1>

	@foreach($person as $individual)
		<div>
			<div class="name">
				{{ $individual->first_name }}  {{ $individual->middle_name }} {{ $individual->last_name }}	
			</div> 
			<div class="dates">
				Born: {{ $individual->birth_date }}.  Died: {{ $individual->death_date}}
			</div>
			<div class="options">
				<a href="articles/{{$individual->person_id}}">Read Stories</a>
				<a href="">Connect</a>
			</div>
		</div>
	@endforeach
@stop