$(function() {
	// Profile Page Layout js.
	if(window.location.pathname == 'story' ||
			window.location.pathname == "relationship" ||
			window.location.pathname == "profile") {
		var container = document.querySelector('.container');
		var msnry = new Masonry( container, {
		  // options
		    columnWidth: 75,
            isFitWidth: true,
		    itemSelector: '.snippet'
		});
		msnry.layout();
	}

	// Welcome page layout js.
      // Mobile js.
    $(".login").on("click", "h1", function(){
        $(".login").find('form').toggleClass("show");
        $('.sign-up form').removeClass("show");
    });
    $(".sign-up").on("click", "h1", function(){
        $(".sign-up").find('form').toggleClass("show");
        $('.login form').removeClass("show");
    });

      // Desk Top js.
	$(".choose-login").on("click", function(){
		$(".login").toggleClass("move-in");
		$('.sign-up').removeClass("move-in");
	});

	$(".choose-sign-up").on("click", function(){
		$(".sign-up").toggleClass("move-in");
		$('.login').removeClass("move-in");
	});


	// Family Tree
	if(window.location.pathname == '/family') {
 		var sys = arbor.ParticleSystem(1000, 400, 1);
        sys.parameters({gravity:true, stiffness:900, repulsion:5000});
        sys.renderer = Renderer("#viewport");
    
        var relations;
        var graphData = {
            nodes: {},
            edges: {
               
            }
        }
            
        var populateRelations = function(person, depth) {
            graphData.nodes[person.person_id] = {
            color: "#014890",
            shape: "dot",
            label: person.first_name + " " 
                   + person.middle_name + " "
                   + person.last_name
            };

            graphData.edges[person.person_id] = {};
            if(!person.relations){
                return;
            }
            person.relations.forEach(function(relation){
                if(!relation) {
                    return;
                }
                if(depth < 5){
                    populateRelations(relation, (depth + 1));
                }
                graphData.edges[person.person_id][relation.person_id] = {};
            });  
        }
        
        // need a placeholder for 1 to make this a true ajax call. 
        $.get('api/1').success(function(data){
            populateRelations(data, 0);
            sys.graft(graphData);
        });
	}

    $("#main_character").select2();
    $("#secondary_characters").select2();

});

