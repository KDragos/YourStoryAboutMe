<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Story About Me</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>">
	<link rel="stylesheet" href="<?php echo asset('css/chosen.css')?>">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>">
	<link href='http://fonts.googleapis.com/css?family=Playball|Shadows+Into+Light+Two|Open+Sans' rel='stylesheet' type='text/css'>
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.css" rel="stylesheet" />
	<script src="/bower_components/jquery/dist/jquery.js"> </script>
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
	<script src="/js/arbor/lib/arbor.js"> </script>
	<script src="/js/arbor/lib/arbor-tween.js"> </script>
	<script src="/js/arbor/demos/halfviz/src/renderer.js"> </script>
	<script src="/js/arbor/demos/_/graphics.js"> </script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.js"></script>


</head>
<body>

	{{-- Header Section --}}
	@section('header')
		<header>
			<a href="/profile"><img src="/images/logotree.png" alt="Logo"></a>
			<h1>Your Story About Me</h1>
			<div>
				<a href="">Update Profile</a>
				<a href="/auth/logout">Logout</a>
			</div>
			<nav>
				<a href="/story">Stories</a>
				<a href="/person">People</a>
				<a href="/family">Your Family Tree</a>
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
		
		@yield('section-nav')	
	
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
					<p>As the years pass, our memories begin to fade and those stories become lost. Finally, there's a place to share those stories!
					Your Story About Me is a place where you can share stories and memories of loved ones. Keep in mind, when reading these stories that each story is written by a real person and their "truth" may not be the exact same memory as you remember it.</p>
			</div>
			<div>
				<h2>Blog</h2>
				<p>This is where I'd put a blog about the site.</p>
				<h2>Contact Us!</h2>
				<a href="">KristinDragos@gmail.com</a>
				{{-- <a>{{ HTML::mailto('KristinDragos@gmail.com', "Contact Us!") }}</a> --}}
			</div>
			<div>
				<h2>Social Media</h2>
				This section might contain links to other social media api's that would help people connect and share stories. 
			</div>
		</footer>
	@show


	{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script> --}} 
	<script src="<?php echo asset('/build.js') ?>"></script>
	{{-- // <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script> --}}


</script>
</body>
</html>