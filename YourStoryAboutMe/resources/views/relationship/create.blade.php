@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="api/{{\Auth::id}}">Your Family</a>
		<a href="/relationship">View Relationships</a>
		<a href="/relationship/create">New Connection</a>
		<a href="">Edit a Connection</a>		
	</div>	
@endsection

@section('main-content')
	<h1>New Relationship</h1>
	@include('errors.list')

	{!! Form::open(['action' => 'RelationshipController@store']) !!}
		@include('relationship._form', ['submitButtonText' => "Save this Relationship"]);
	{!! Form::close() !!}	
	
@stop