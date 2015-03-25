{{-- Main form --}}
<div class="form-group">
	{!! Form::label('main_character', 'Main Character:') !!}		
	<select name="main_character">
		@foreach($person as $individual) 
			<option value="{{$individual->person_id}}"> {{$individual->first_name}} {{$individual->middle_name}} {{$individual->last_name}} </option>	
		@endforeach
	</select>
{{-- 	{!! Form::text('main_character', null, ['class' => 'form-control']) !!}	
 --}}</div>

<div class="form-group">
	{!! Form::label('secondary_characters', 'Secondary Characters:') !!}
	<select name="secondary_characters">
		<option value="null"> </option>
		@foreach($person as $individual) 
			<option value="{{$individual->person_id}}"> {{$individual->first_name}} {{$individual->middle_name}} {{$individual->last_name}} </option>	
		@endforeach
	</select>
{{-- 	{!! Form::text('secondary_characters', null, ['class' => 'form-control']) !!}	
 --}}</div>

<div class="form-group">
	{!! Form::label('story_text', 'Story:') !!}
	{!! Form::textarea('story_text', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Publish On:') !!}
	{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>