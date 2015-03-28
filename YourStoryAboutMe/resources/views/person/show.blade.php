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
	<h1>
		{{ $person->first_name}} {{$person->middle_name}} {{$person->last_name}} {{$person->suffix}}
	</h1>
	<div class="author-details">
		{{ $person->birth_date }} - {{ $person->death_date }}
		{{-- <img src=" image for user would go here somewhere. " alt=""> --}}
	</div>
	<div>
		<h2>View {{$person->first_name}}'s Stories</h2>				
		{{-- <div> Stories where this person is either a primary or secondary
					 character will be put here. These will be displayed using
					 masonry.  </div> --}}
	</div>
@stop