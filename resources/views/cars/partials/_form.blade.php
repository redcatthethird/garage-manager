<div class="form-group">
	{!! Form::label('LicencePlate', 'LicencePlate:') !!}
	{!! Form::text('LicencePlate') !!}
</div>
<div class="form-group">
	{!! Form::label('ClientId', 'ClientId:') !!}
	{!! Form::text('ClientId') !!}
</div>
<div class="form-group">
	{!! Form::label('Model', 'Model:') !!}
	{!! Form::text('Model') !!}
</div>

<div class="form-group">
	{!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>
