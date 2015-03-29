<div class="form-group">
	{!! Form::label('person_id1', 'Person One:') !!}
	{!! Form::select('person_id1', $person, null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
	{!! Form::label('relationship', 'is the ') !!}
	{!! Form::select('relationship', ['parent' => 'parent',
	 								  'child'  => 'child',
	 								  'spouse' => 'spouse'],
	 				null, ['class' => 'form-control', 'required']) !!}
</div>	
<div class="form-group">
	{!! Form::label('person_id2', 'of Person Two:') !!}
	{!! Form::select('person_id2', $person, null, ['class' => 'form-control', 'required']) !!}
</div>		
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
