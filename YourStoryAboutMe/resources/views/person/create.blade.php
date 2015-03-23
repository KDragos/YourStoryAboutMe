@extends('layout')

@section('main-content')
	<h1>Can't find the person you're looking for? You can add him or her here.</h1>
@include('errors.list')
	
	{{-- Add some functionality to ensure users can't create a person more than once. 
			I might use the helper functions firstOrCreate() or firstOrNew().    --}}
			
	{!! Form::open(['url' => 'person']) !!}
		@include('person._form', ['submitButtonText' => "Add This Person"])
	{!! Form::close() !!}	

@endsection