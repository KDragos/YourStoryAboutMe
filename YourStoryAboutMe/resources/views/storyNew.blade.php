

@extends('layout')

@section('main-content')

{!! Form::open() !!}
	<div class="form-group">
		{!! Form::label('characters', 'Characters') !!}
		{!! Form::text('characters') !!}	
	</div>
	<div class="form-group">
		{!! Form::label('story', 'Story') !!}
		{!! Form::textarea('story') !!}	
	</div>
	<div class="form-group">
		{{-- {!! Form:submit('Add Story') !!} --}}
	</div>
{!! Form::close() !!}	

@endsection