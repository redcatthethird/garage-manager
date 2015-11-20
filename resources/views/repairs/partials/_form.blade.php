<div class="modal-body">
	<div class="form-group">
		{!! Form::label('LicencePlate', 'License Plate No:') !!}
		{{--!! Form::text('LicencePlate', isset($repair) ? null : 'Licence plate', ['class' => 'form-control']) !!--}}
		<select name='LicencePlate' value="{{ isset($repair) ? null : 'Licence plate' }}" class="form-control">
			@foreach(App\Car::all() as $car)
                  <option value="{{ $car->LicencePlate }}">{{ $car->Model . " [" . $car->LicencePlate . "]" }}</option>
            @endforeach
        </select>
	</div>
	
	<div class="form-group">
		{!! Form::label('StaffId', 'Staff in charge:') !!}
		{{--!! Form::text('StaffId', isset($repair) ? null : 'Staff in charge', ['class' => 'form-control']) !!--}}
		<select name='StaffId' value="{{ isset($repair) ? null : 'Staff in charge' }}" class="form-control">
			@foreach(App\Staff::all() as $staff)
                  <option value="{{ $staff->Id }}">{{ $staff->Name . " [" . $staff->Id . "]" }}</option>
            @endforeach
        </select>
	</div>
	<div class="form-group">
			{!! Form::checkbox('Ongoing', isset($repair) ? null : 0, ['class' => 'form-control']) !!}
			{!! Form::label('Ongoing', 'Ongoing') !!}
	</div>
	<div class="form-group">
		{!! Form::label('Type', 'Repair type') !!}
		{!! Form::text('Type', isset($repair) ? null : 'Repair type', ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('Comments', 'Comments') !!}
		{!! Form::textarea('Comments', isset($repair) ? null : 'Comments', ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('StartDate', 'Start Date') !!}
		<div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
		{!! Form::text('StartDate', isset($repair) ? null : null, ['class' => 'form-control', 'id' => 'startDate', 'data-inputmask' => "'alias': 'yyyy-mm-dd'", 'data-mask' => ""]) !!}
        </div>

	</div>
	
	<div class="form-group">
		{!! Form::label('EndDate', 'Expected End Date') !!}
		<div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
		{!! Form::text('EndDate', isset($repair) ? null : 'Expected End Date', ['class' => 'form-control', 'data-inputmask' => "'alias': 'yyyy-mm-dd'", 'data-mask' => ""]) !!}
        </div>
		
	</div>
	
	<div class="form-group">
		{!! Form::label('Cost', 'Cost') !!}
		{!! Form::text('Cost', isset($repair) ? null : 'Cost', ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
			{!! Form::checkbox('Paid', isset($repair) ? null : 0, ['class' => 'form-control']) !!}
			{!! Form::label('Paid', 'Paid') !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>

<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
$("input[name$=Date]").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
</script>