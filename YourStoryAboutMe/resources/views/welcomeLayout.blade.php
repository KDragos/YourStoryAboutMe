

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Your Story About Me</title>
	<link rel="stylesheet" href="<?php echo asset('css/styles.css')?>">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="./js/scripts.js"></script>

</head>
<body>

	<section class="welcome-hero">
		@section('hero')
		<section>
			<div>
				<h1>Welcome to Your Story About Me! </h1>
				<h4>“In creative nonfiction, we are writing “truth” ... and yet in telling the same story, several people might each remember a different “truth”.”</h4>
			</div>
			<p>As the years pass, our memories begin to fade and those stories become lost. Finally, there's a place to share those stories!</p>
			<p>Your Story About Me is a place where you can share stories and memories of loved ones. Keep in mind, when reading these stories that each story is written by a real person and their "truth" may not be the exact same memory as you remember it.</p>
		</section>
		@show
		<div>
			You can either 
			<h1 class="choose-login">
				Login
			</h1>
			or 
			<h1 class="choose-sign-up">
				Sign Up
			</h1>
		</div>
		@include('errors.list')
		<div class="login">
			<h1>Login</h1>
			<div>
				{!! Form::open(['url' => '/auth/login']) !!}
					@include('auth._loginForm', ['submitButtonText' => "Login"])
				{!! Form::close() !!}	
			</div>
		</div>
		
		<div class="sign-up">
			<h1>Sign Up</h1>
			<div>
				{!! Form::open(['url' => '/auth/register']) !!}
					@include('auth._signUpForm', ['submitButtonText' => "Sign Up"])
				{!! Form::close() !!}	
				
			</div>
		</div>
	</section>

</body>
</html>