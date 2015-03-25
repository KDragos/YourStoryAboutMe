{{-- Main form --}}
<div class="form-group">
	{!! Form::label('first_name', 'First Name:') !!}
	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('middle_name', 'Middle Name:') !!}
	{!! Form::text('middle_name', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('last_name', 'Last Name:') !!}
	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('suffix', 'Suffix:') !!}
	{!! Form::text('suffix', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('birth_date', 'Birth Date:') !!}
	{!! Form::input('date', 'birth_date', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('is_alive', 'Is this person still alive?', ['id' => 'is_alive', 'attribute' => 'required']) !!}
	<div>
		Yes: {!! Form::checkbox('is_alive', true, ['attribute' => 'checked']) !!}
	</div>
{{-- 	<div>
		No: {!! Form::radio('is_alive', false) !!}		
	</div> --}}

</div>

<div class="form-group">
	{!! Form::label('death_date', 'Died On:') !!}
	{!! Form::input('date', 'death_date', null, 
					['class' => 'form-control',
					 'id' => 'death_date'
					 ]) !!}	
	{{-- Fix this error of this needing to be a required field.  --}}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>