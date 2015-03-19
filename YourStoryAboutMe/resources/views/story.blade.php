@extends('layout')

@section('main-content')
	<div class='story-base'>
		<div class="cast">
			List the primary characters here... 
		</div>
		<div>Full story goes here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia reprehenderit aut aspernatur minima deserunt tempora officia eum, cum quos eaque iusto soluta quod explicabo molestias eveniet quisquam ratione animi labore.</div>
		<div class="author-details">
			<img src="images/logotree.png" alt="">
			<a href="">The Author</a>
			<p>Date created</p>
		</div>
	</div>
	<div class='story-addon'>
{{-- 		<div>Full story goes here. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia reprehenderit aut aspernatur minima deserunt tempora officia eum, cum quos eaque iusto soluta quod explicabo molestias eveniet quisquam ratione animi labore.</div>
		<div class="author-details">
			<img src="images/logotree.png" alt="">
			<a href="">The Author</a>
			<p>Date created</p>
		</div> --}}
	</div>
	<div class="button-pair">
		<button>Share Your Own Story</button>
		<button>Add To This Story</button>
	</div>
@endsection