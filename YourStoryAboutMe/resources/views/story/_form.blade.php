{{-- Main form --}}
<div class="form-group">
	{!! Form::label('main_character', 'Main Character:') !!}
	{!! Form::select('main_character', $person, null, ['class' => 'form-control']) !!}
</div> 

<div class="form-group">
	{!! Form::label('secondary_characters', 'Secondary Characters:  (Use control or command to selet more than one)') !!}
	{!! Form::select('secondary_characters[]', $person, null, ['id' => 'secondary_characters', 'class' => 'form-control', 'multiple']) !!}
</div>

{{-- <div class='form-group'>
	<select class="js-example-placeholder-single js-states form-control" tabindex="-1">
		<option value="One">One</option>
		<option value="Two">Two</option>
		<option value="Three">Three</option>
		<option value="Four">Four</option>
	</select>
</div> --}}

<div class="form-group">
	{!! Form::label('story_text', 'Story:') !!}
	{!! Form::textarea('story_text', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control select2-selection select2-selection--single']) !!}	
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
<script>
	// $("#secondary_characters").select2();
	$("#secondary_characters").select2();
</script>
@endsection