@extends('layout')

@section('main-content')
	<h1>
		{{ $person->first_name}} {{$person->middle_name}} {{$person->last_name}} {{$person->suffix}}
	</h1>
	<div class="author-details">
		{{ $person->birth_date }} - {{ $person->death_date }}
		{{-- <img src=" image for user would go here somewhere. " alt=""> --}}
		@if ($person->user_id == NULL)
			<a href="/person/{{$person->person_id}}/claim">Are you {{ $person->first_name}}?</a>
		@endif
	</div>
	<div>
		<h2>View {{$person->first_name}}'s Stories</h2>				
		{{-- <div> Stories where this person is either a primary or secondary
					 character will be put here. These will be displayed using
					 masonry.  </div> --}}
	</div>
@stop