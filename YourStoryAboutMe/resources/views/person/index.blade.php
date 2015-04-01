@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="/person">People</a>
		<a href="/person/create">New Person</a>
		<a href="">Edit a Connection</a>			
	</div>	
@endsection

@section('main-content')
<h1>All people!</h1>
<div>
	@if (Session::has('flash_message'))
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<div class="alert alert-success">{{ Session::get('flash_message') }}</div>
	@endif
{!! Form::open(['url' => 'person']) !!}
	<input list="people" name="people">
	<datalist id="people">
		@foreach($person as $individual) 
			<option value="{{$individual->person_id}}"> {{$individual->first_name}} {{$individual->middle_name}} {{$individual->last_name}} </option>	
		@endforeach
	</datalist>
	<input type="submit">
</form>
</div>
<div>
	Can't find who you're looking for?
	<a href="/person/create">Create a new person.</a>
</div>
<div class="container js-masonry">
	@foreach($person as $individual)
		<div class="snippet">
			<div class="name">
				{{ $individual->first_name }}  {{ $individual->middle_name }} {{ $individual->last_name }} {{ $individual->suffix}}	
			</div> 
			<div class="dates">
				Born: {{ $individual->birth_date }}.  Died: {{ $individual->death_date}}
			</div>
			<div class="options">
				<a href="person/{{$individual->person_id}}">Read Stories</a>
				<a href="{{ action('PersonController@edit', [$individual->person_id]) }}">Update</a>
				<a href="/relationship/create">Connect</a>
			</div>
		</div>
	@endforeach
	
	
</div>
@stop