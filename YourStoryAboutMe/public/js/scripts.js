$(function() {
	// Profile Page Layout js.
	if(window.location.pathname == 'story' ||
			window.location.pathname == "relationship" ||
			window.location.pathname == "profile") {
		var container = document.querySelector('.container');
		var msnry = new Masonry( container, {
		  // options
		    columnWidth: 200,
		    itemSelector: '.snippet',
		    transitionDuration: '0.2',
            position: 'relative',
            isFitWidth: true
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
 		var sys = arbor.ParticleSystem(1000, 400, 3);
        	sys.parameters({gravity:false});
          sys.renderer = Renderer("#viewport");
    
        var relations;
       
        var graphData = {
            nodes: {},
            edges: {
               
            }
        }

        // need a placeholder for 1. 
        $.get('api/1').success(function(data){
            relations = data;

          
            graphData.nodes[data.person_id] = {
                color: "#014890",
                shape: "dot",
                label: data.first_name + " " + data.middle_name + " " + data.last_name
            };

            graphData.edges[data.person_id] = {};

            data.relations.forEach(function(relation){
                graphData.nodes[relation.person_id] = {
                    color: '#014890',
                    shape: 'dot',
                    label: relation.first_name + " "
                        + relation.middle_name + " " 
                        + relation.last_name
                }

                graphData.edges[data.person_id][relation.person_id] = {};                     
            });
            // graphData.edges.data-{style: "->"};
            sys.graft(graphData);



            // console.log('made it this far.');
        });
              // var data = {
              // nodes:{
              // animals:{'color':'red','shape':'dot','label':'Animals'},
              // dog:{'color':'green','shape':'dot','label':'dog'},
              // cat:{'color':'blue','shape':'dot','label':'cat'}
              // },
              // edges:{
              //   animals:{ dog:{}, cat:{} }}
              // };
              
          // sys.graft(data);

          // setTimeout(function(){
          //   var postLoadData = {
          //   nodes:{
          //   joe:{'color':'orange','shape':'diamond','label':'joe'},
          //   fido:{'color':'green','shape':'dot','label':'fido'},
          //   fluffy:{'color':'blue','shape':'dot','label':'fluffy'}
          //   },
          //   edges:{
          //   dog:{ fido:{} },
          //   cat:{ fluffy:{} },
          //   joe:{ fluffy:{},fido:{} }
          //   }
          //   };
          //   sys.graft(postLoadData);
          //   },10000);
          
          // var food = sys.addNode('Food', {'color':'blue','shape':'square','label':'Food'});
          //                                     // data. 
          // var apple = sys.addNode('apple', {'color': 'red', 'shape':'square', 'label': 'apple'});
          // var banana = sys.addNode('banana', {'color': 'purple', 'shape': 'square', 'label': 'banana'});

          // sys.addEdge(food, apple);
          // sys.addEdge(food, banana);
          // var family = some information that comes back from the database!
	}




});


