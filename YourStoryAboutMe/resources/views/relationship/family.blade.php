@extends('layout')
@section('section-nav')
	<div class="story-nav">
		<a href="/family">Your Family</a>
		<a href="/relationship">View Relationships</a>
		<a href="/relationship/create">New Connection</a>
		<a href="">Edit a Connection</a>		
	</div>	
@endsection

@section('main-content')
<h1>Your Connections</h1>
<div class="canvas-wrapper">
<canvas id="viewport" width="800" height="600"></canvas>
</div>


<script language="javascript" type="text/javascript">
// 	var sys = arbor.ParticleSystem(1000, 400,1);
// 	sys.parameters({gravity:true});
// 	sys.renderer = Renderer("#viewport") ;
// 	var animals = sys.addNode('Animals',{'color':'red','shape':'dot','label':'Animals'});

</script>


{{-- <script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script> --}}
@stop