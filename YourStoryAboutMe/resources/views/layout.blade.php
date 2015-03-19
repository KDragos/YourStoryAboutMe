<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Story About Me</title>
	<link rel="stylesheet" href="<?php echo asset('css/app.css')?>">
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>">


</head>
<body>
	{{-- Header Section --}}
	@section('header')
		<header>
			<a href="/"><img src="/images/logotree.png" alt="Logo"></a>
			<div>
				<button>Update Profile</button>
				<button>Invitations</button>
			</div>
			<nav>
				<a href="">New Story</a>
				<a href="">Search for Peaople</a>
				<a href="">Your Family Tree</a>
			</nav>	
		</header>
	@show
	{{-- Hero Section --}}
	@section('hero')
		<section class="hero">
			<div>
				<h1>Welcome, User! </h1>
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


	<script src="<?php echo asset('/js/main.js') ?>"></script>
	<script src="/node_modules/masonry-layout/dist/masonry.pkgd.min.js"></script>
</body>
</html>