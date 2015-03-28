{{-- Main form --}}
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', null, ['class' => 'form-control']) !!}	
</div>
<div class="form-group">
	{!! Form::label('remember', 'Remember Me:') !!}
	{!! Form::checkbox('remember', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
<div class="form-group">
	<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
</div>