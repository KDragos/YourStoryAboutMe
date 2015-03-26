<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Story About Me</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>">
	<link rel="stylesheet" href="<?php echo asset('css/chosen.css')?>">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>">
	<link href='http://fonts.googleapis.com/css?family=Playball|Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>
	<script src="/bower_components/jquery/dist/jquery.js"> </script>
	<script src="/js/arbor/lib/arbor.js"> </script>
	<script src="/js/arbor/lib/arbor-tween.js"> </script>
	<script src="/js/arbor/demos/halfviz/src/renderer.js"> </script>
	<script src="/js/arbor/demos/_/graphics.js"> </script>


</head>
<body>
	{{-- Header Section --}}
	@section('header')
		<header>
			<a href="/profile"><img src="/images/logotree.png" alt="Logo"></a>
			<div>
				<button>Update Profile</button>
				<button>Invitations</button>
				<a href="/auth/logout">Logout</a>
			</div>
			<nav>
				<a href="/story">Stories</a>
{{-- 					<ul class="sub-nav">
						<a href="/story/create">New Story</a>
					</ul> --}}
				<a href="/person">Search for People</a>
					<ul class="sub-nav">
						<a href="/person/create">New Person</a>
					</ul>
				<a href="/relationship">Your Family Tree</a>
					<ul class="sub-nav">
						<a href="/relationship/create">New Connection</a>
					</ul>
			</nav>	
		</header>
	@show
	{{-- Hero Section --}}
	@section('hero')
		<section class="hero">
			<div>
				<h1>Welcome, {{ Auth::User()->first_name }}! </h1>
				<h4>“In creative nonfiction, we are writing “truth” ... and yet in telling the same story, several people might each remember a different “truth”.”</h4>
			</div>
		</section>
	@show

	{{-- Main Content --}}
	<main>
		@yield('main-content')
	</main>


	{{-- Footer Section --}}
	@section('footer')
		<footer>
			<div>
				<h2>About</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga corrupti recusandae fugit impedit non id, a nam ab quidem molestias maiores earum iusto nulla, officiis ipsa sapiente. Maiores, amet doloremque.</p>
			</div>
			<div>
				<h2>Blog</h2>
				<p>This is where I'd put a blog about the site.</p>
				<h2>Contact Us!</h2>
				<a href="">KristinDragos@gmail.com</a>
			</div>
			<div>
				<h2>Social Media</h2>
				This section might contain links to other social media api's that would help people connect and share stories. 
			</div>
		</footer>
	@show


	<script src="<?php echo asset('/build.js') ?>"></script>
	<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

</body>
</html>