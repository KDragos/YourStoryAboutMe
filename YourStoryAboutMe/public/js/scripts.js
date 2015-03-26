$(function() {
	// Profile Page Layout js.
	if(window.location.pathname == 'story' ||
			window.location.pathname == "relationship" ||
			window.location.pathname == "profile") {
		var container = document.querySelector('.container');
		var msnry = new Masonry( container, {
		  // options
		  columnWidth: 100,
		  itemSelector: '.snippet',
		  isFitWidth: true,
		  transitionDuration: '0.2',


		});

		msnry.layout();
		
	}
	

	// Welcome page layout js.
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
                color: "red",
                shape: "dot",
                // shape: "<div>",
                label: data.first_name + " " + data.middle_name + " " + data.last_name
            };

            graphData.edges[data.person_id] = {};

            data.relations.forEach(function(relation){
                console.log(typeof(relation) + "and "  + relation.first_name);

                    graphData.nodes[relation.person_id] = {
                        color: 'green',
                        shape: 'dot',
                        label: relation.first_name + " " + relation.middle_name + " " + relation.last_name
                    }

                    graphData.edges[data.person_id][relation.person_id] = {};                     
            });
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


