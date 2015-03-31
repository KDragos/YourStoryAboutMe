@extends('layout')

@section('section-nav')
	<div class="story-nav">
		<a href="/profile">Stories About Me</a>
		<a href="/person/dashboard">My Dashboard</a>
{{-- 		<a href="">Edit a Person</a>
		<a href="">Delete a Person</a>	 --}}		
	</div>	
@endsection

@section('main-content')
	<div>
		For each story, there'll be a section that looks like: 
		<div class="dashboard-snippet">
			<a href="">View</a>
			<a href="">Edit</a>
			<a href="">Delete</a>
			<p>Date Created</p>
			<p>This is going to have a couple of lines of the story. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate in nam laboriosam et, aliquid maiores vel, tempore exercitationem neque dolores sed inventore ipsa provident dolorem similique! Temporibus maxime exercitationem, nihil?</p>

		</div>


	</div>


@stop