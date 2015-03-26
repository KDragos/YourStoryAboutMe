<div class="form-group">
	<label for="person_id1">Person One: </label>
	<input list="people" name="person_id1" required>
	<datalist id="people">
		@foreach($people as $person) 
			<option value="{{$person->first_name}} {{$person->middle_name}} {{$person->last_name}}">{{$person->first_name}} {{$person->middle_name}} {{$person->last_name}} </option>	
		@endforeach
	</datalist>
</div>	
<div class="form-group">
	<label for="relationship">is the </label>
	<select name="relationship">
		<option value="parent">Parent</option>
		<option value="spouse">Spouse</option>
		<option value="child">Child</option>
	</select>
	<label> of </label>
</div>
<div class="form-group">
	<label for="person_id2">Person Two: </label>
	<input list="people" name="person_id2" required>
	<datalist id="people">
		@foreach($people as $person) 
			<option value="{{$person->first_name}} {{$person->middle_name}} {{$person->last_name}}"> {{$person->first_name}} {{$person->middle_name}} {{$person->last_name}} </option>	
		@endforeach
	</datalist>
</div>	
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
