<div class="modal-body">
	<div class="form-group">
		{!! Form::label('LicencePlate', 'License Plate No:') !!}
		{!! Form::text('LicencePlate') !!}
		<a href="{{ URL::route('cars.create')}}">Add new car</a>
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
		{!! Form::checkbox('Paid') !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>
