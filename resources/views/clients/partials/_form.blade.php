<div class="form-group">
	{!! Form::label('Name', 'Name:') !!}
	{!! Form::text('Name') !!}
</div>
<div class="form-group">
	{!! Form::label('Address', 'Address:') !!}
	{!! Form::text('Address') !!}
</div>
<div class="form-group">
	{!! Form::label('PhoneNo', 'Phone number:') !!}
	{!! Form::text('PhoneNo') !!}
</div>
<div class="form-group">
	{!! Form::label('Email', 'E-mail:') !!}
	{!! Form::text('Email') !!}
</div>

<div class="form-group">
	{!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>
