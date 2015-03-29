@extends('layout')

@section('main-content')

	<div class="story-container js-masonry">
		<div class="snippet">
			<p class="story"> This paragraph should have a triangle comment around it as a border. consectetur adipisicing elit. Excepturi cum, illum maiores beatae praesentium fugiat, minus blanditiis sint tempore incidunt unde officiis esse, necessitatibus eos dignissimos saepe reprehenderit inventore est! dolor sit amet, consectetur adipisicing elit. Nisi, voluptatum.</p>
			<div class="author-details">
				<img src="images/logotree.png" alt="">
				<a href="">More...</a>
				<a href="">The Author</a>
				<p>Date created</p>				
			</div>
		</div>

		<p>This page should show only the stories that the user is tagged in.</p>
	</div>

@endsection

