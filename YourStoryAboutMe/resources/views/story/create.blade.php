@extends('layout')

@section('main-content')
	<h1>Tell your story!</h1>
@include('errors.list')

	{!! Form::open(['url' => 'story']) !!}
		@include('story._form', ['submitButtonText' => "Tell Your Story"])
	{!! Form::close() !!}	

@endsection