<div class="modal-body">

        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

	<div class="form-group">
		{!! Form::label('LicencePlate', 'License Plate No:') !!}
		{{--!! Form::text('LicencePlate', isset($repair) ? null : 'Licence plate', ['class' => 'form-control']) !!--}}
		<select name='LicencePlate' value="{{ isset($repair) ? null : 'Licence plate' }}" class="form-control">
            <option value="" disabled {!! isset($repair) ? "" : "selected" !!}> -- Select a car licence plate -- </option>
			@foreach(App\Car::all() as $car)
                  <option value="{{ $car->LicencePlate }}" {!! (isset($repair) ? "selected" : "") !!}>{{ $car->Model . " [" . $car->LicencePlate . "]" }}</option>
            @endforeach
        </select>
	</div>

	<div class="form-group">
		{!! Form::label('StaffId', 'Staff in charge:') !!}
		{{--!! Form::text('StaffId', isset($repair) ? null : 'Staff in charge', ['class' => 'form-control']) !!--}}
		<select name='StaffId' value="{{ isset($repair) ? null : 'Staff in charge' }}" class="form-control">
            <option value="" disabled {!! isset($repair) ? "" : "selected" !!}> -- Select a staff member -- </option>
			@foreach(App\Staff::all() as $staff)
                  <option value="{{ $staff->Id }}" {!! (isset($repair) ? "selected" : "") !!}>{{ $staff->Name . " [" . $staff->Id . "]" }}</option>
            @endforeach
        </select>
	</div>

	<div class="form-group">
			{!! Form::checkbox('Ongoing', null, ['class' => 'form-control']) !!}
			{!! Form::label('Ongoing', 'Ongoing?') !!}
	</div>
	<div class="form-group">
		{!! Form::label('Type', 'Repair type') !!}
		{!! Form::text('Type', null, ['class' => 'form-control', 'placeholder' => 'What was the repair?']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('Comments', 'Comments') !!}
		{!! Form::textarea('Comments', null, ['class' => 'form-control', 'placeholder' => 'Any comments on the repair process']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('StartDate', 'Start Date') !!}
		<div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
		{!! Form::text('StartDate', null, ['class' => 'form-control', 'placeholder' => 'When the repair will start (preferably today)']) !!}
        </div>

	</div>

	<div class="form-group">
		{!! Form::label('EndDate', 'Expected End Date') !!}
		<div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
		{!! Form::text('EndDate', null, ['class' => 'form-control', 'placeholder' => 'When we expect the repair to be done']) !!}
        </div>
	</div>

	<div class="form-group">
		{!! Form::label('Cost', 'Cost') !!}
		{!! Form::text('Cost', null, ['class' => 'form-control', 'placeholder' => 'Cost']) !!}
	</div>

	<div class="form-group">
			{!! Form::checkbox('Paid', null, ['class' => 'form-control']) !!}
			{!! Form::label('Paid', 'Paid?') !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>

<script src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
$("input[name$=Date]").daterangepicker({
    locale: {
      format: 'DD/MM/YYYY'
    },
    minDate: moment(),
    startDate: moment(),
    drops: "up",
    showDropdowns: true,
	singleDatePicker: true
});
</script>