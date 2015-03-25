@extends("layout")

@section('main-content')
<div>
	<p>When signing up for Your Story About Me, you created a user account. To enjoy the fullest functionality of our site, including creating your family tree, you'll have to claim a person. You can only claim one person. By claiming your person in our system, you can monitor stories being told about you.</p>
	<h3>Important:</h3>
	<p>Once you've claimed a person, you can not claim a second. Be sure this is really you before claiming this person.</p>
	<p>By filling out this form, you are this person.</p>
</div>

{!! Form::open(['url' => '/person/claim']) !!}
	<div class="form-group">
		{!! Form::label('claimed', 'These stories are about me!') !!}
		{!! Form::checkbox('claimed', null, ['class' => 'form-control']) !!}	
	</div>
	<div class="form-group">
		{!! Form::submit("Claim my stories!", ['class' => 'btn btn-primary form-control']) !!}
	</div>
{!! Form::close() !!}	



<div>	
	<h1>
		{{ $person->first_name}} {{$person->middle_name}} {{$person->last_name}} {{$person->suffix}}
	</h1>
	<div class="author-details">
		{{ $person->birth_date }} - {{ $person->death_date }}
		{{-- <img src=" image for user would go here somewhere. " alt=""> --}}
	</div>
	<div>
		<h2>View {{$person->first_name}}'s Stories</h2>				
		{{-- <div> Stories where this person is either a primary or secondary
					 character will be put here. These will be displayed using
					 masonry.  </div> --}}
	</div>	
</div>

@stop