@extends('layout')

@section('main-content')
	<h1>New Relationship</h1>
	@include('errors.list')

	{!! Form::open(['url' => 'relationship']) !!}
		@include('relationship._form', ['submitButtonText' => "Save this Relationship"]);
	{!! Form::close() !!}	
	
@stop