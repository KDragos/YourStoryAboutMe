

{{-- Main form --}}
<div class="form-group">
	{!! Form::label('main_character', 'Main Character:') !!}
	{!! Form::text('main_character', null, ['class' => 'form-control']) !!}	
</div>

<div class="form-group">
	{!! Form::label('secondary_characters', 'Secondary Characters:') !!}
	{!! Form::text('secondary_characters', null, ['class' => 'form-control']) !!}	
</div>

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