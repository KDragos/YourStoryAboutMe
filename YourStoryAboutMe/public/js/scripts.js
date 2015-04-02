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
		    // transitionDuration: '0.1',
            // position: 'relative'
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
            // console.log(person);
            if(!person.relations){
                return;
            }
            person.relations.forEach(function(relation){
                // if(relation instanceof Array) return;
                // console.log(relation);
                if(!relation) {
                    return;
                }
                if(depth < 5){
                    populateRelations(relation, (depth + 1));
                }
                graphData.edges[person.person_id][relation.person_id] = {};
            });  
        }
        // need a placeholder for 1. 
        $.get('api/1').success(function(data){
            // populateRelations(data, 0);
            populateRelations(data, 0);
            // populateRelations(data);
            // graphData.nodes[data.person_id] = {
            //     color: "#014890",
            //     shape: "dot",
            //     label: data.first_name + " " + data.middle_name + " " + data.last_name
            // };

            // graphData.edges[data.person_id] = {};

            // data.relations.forEach(function(relation){
            //     graphData.nodes[relation.person_id] = {
            //         color: '#014890',
            //         shape: 'dot',
            //         label: relation.first_name + " "
            //             + relation.middle_name + " " 
            //             + relation.last_name
            //     }

            //     graphData.edges[data.person_id][relation.person_id] = {};                     
            // });
            // graphData.edges.data-{style: "->"};
            // console.log(graphData);
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

