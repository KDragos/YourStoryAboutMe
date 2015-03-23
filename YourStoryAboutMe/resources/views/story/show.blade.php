@extends('layout')

@section('main-content')
	<h1>Show one story.</h1>
	<div>
		{{ $story->story_text}}
	</div>
	<div class="author-details">
		{{-- <img src=" image for user would go here. " alt=""> --}}
		<div>Created By: {{ $story->created_by }} </div>
		<p>Created On: {{ $story->created_at }}</p>				
	</div>
@stop