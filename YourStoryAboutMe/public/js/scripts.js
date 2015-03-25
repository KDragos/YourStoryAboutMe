$(function() {
	// Profile Page Layout js.
	if (window.location.pathname == "/profile") {
		var container = document.querySelector('.container');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: 275,
		  itemSelector: '.snippet'
		});

		msnry.layout();
	}

	// Welcome page layout js.
	$(".login").on("click", function(){
		$(this).find("form").toggleClass("show");
	});
	$(".sign-up").on("click", function(){
		$(this).find("form").toggleClass("show");
	});

	$(".choose-login").on("click", function(){
		$(".login").toggleClass("move-in");
		$('.sign-up').removeClass("move-in");
	});

	$(".choose-sign-up").on("click", function(){
		$(".sign-up").toggleClass("move-in");
		$('.login').removeClass("move-in");
	});
	
	// Person form validation
	// if(window.location.pathname == '/person{id}edit' || 

		// ToDo Note: This still doens't work correctly.
	if (window.location.pathname == '/person/create') {
		$("#is_alive").on('click', function(){
			$("#death_date").toggleAttr('required');
		});
	

	}






});


