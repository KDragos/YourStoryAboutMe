@extends('layout')

@section('main-content')
	<h1>All people!</h1>
	<div>
		Seach for people: <input type="text">
	</div>
	<div>
		Can't find who you're looking for?
		<a href="/person/create">Create a new person.</a>
	</div>
	@foreach($person as $individual)
		<div class="author-details">
			<div class="name">
				{{ $individual->first_name }}  {{ $individual->middle_name }} {{ $individual->last_name }}	
			</div> 
			<div class="dates">
				Born: {{ $individual->birth_date }}.  Died: {{ $individual->death_date}}
			</div>
			<div class="options">
				<a href="person/{{$individual->person_id}}">Read Stories</a>
				<a href="{{ action('PersonController@edit', [$individual->person_id]) }}">Update</a>
			</div>
		</div>
	@endforeach
@stop