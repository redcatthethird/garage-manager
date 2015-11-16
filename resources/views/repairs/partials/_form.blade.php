<div class="form-group">
	{!! Form::label('LicencePlate', 'License Plate No:') !!}
	{!! Form::text('LicencePlate') !!}
</div>
<div class="form-group">
	{!! Form::label('StaffId', 'Staff in charge:') !!}
	{!! Form::text('StaffId') !!}
</div>
<div class="form-group">
	{!! Form::label('Ongoing', 'Ongoing?') !!}
	{!! Form::text('Ongoing') !!}
</div>
<div class="form-group">
	{!! Form::label('Type', 'Type') !!}
	{!! Form::text('Type') !!}
</div>

<div class="form-group">
	{!! Form::label('Comments', 'Comments') !!}
	{!! Form::text('Comments') !!}
</div>

<div class="form-group">
	{!! Form::label('StartDate', 'Start Date') !!}
	{!! Form::text('StartDate') !!}
</div>

<div class="form-group">
	{!! Form::label('EndDate', 'Expected End Date') !!}
	{!! Form::text('EndDate') !!}
</div>

<div class="form-group">
	{!! Form::label('Cost', 'Cost') !!}
	{!! Form::text('Cost') !!}
</div>

<div class="form-group">
	{!! Form::label('Paid', 'Paid') !!}
	{!! Form::text('Paid') !!}
</div>

<div class="form-group">
	{!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>
