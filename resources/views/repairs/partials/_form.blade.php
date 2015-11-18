<div class="form-group">
	{!! Form::label('LicencePlate', 'License Plate No:') !!}
	{!! Form::text('LicencePlate') !!}
	<a href="{{ URL::route('cars.create', array($cars[$i]['Id'])) }}">Add new car</a>
</div>

<div class="form-group">
	{!! Form::label('StaffId', 'Staff in charge:') !!}
	{!! Form::text('StaffId') !!}
</div>
<div class="form-group">
	{!! Form::label('Ongoing', 'Ongoing?') !!}
	{!! Form::checkbox('Ongoing') !!}
</div>
<div class="form-group">
	{!! Form::label('Type', 'Repair type') !!}
	{!! Form::text('Type') !!}
</div>

<div class="form-group">
	{!! Form::label('Comments', 'Comments') !!}
	{!! Form::textarea('Comments') !!}
</div>

<div class="form-group">
	{!! Form::label('StartDate', 'Start Date') !!}
	{!! Form::text('StartDate', 'dd-mm-yy', array('class' => 'datepicker')) !!}
	
</div>

<div class="form-group">
	{!! Form::label('EndDate', 'Expected End Date') !!}
	{!! Form::text('EndDate', 'dd-mm-yy', array('class' => 'datepicker')) !!}
	
</div>

<div class="form-group">
	{!! Form::label('Cost', 'Cost') !!}
	{!! Form::text('Cost') !!}
</div>

<div class="form-group">
	{!! Form::label('Paid', 'Paid') !!}
	{!! Form::checkbox('Paid') !!}
</div>

<div class="form-group">
	{!! Form::submit($submit_text, ['class' => 'btn primary']) !!}
</div>
