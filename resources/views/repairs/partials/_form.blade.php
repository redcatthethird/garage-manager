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
		<select name='LicencePlate' class="form-control">
            <option value="" disabled {!! isset($repair) ? "" : "selected" !!}> -- Select a car licence plate -- </option>
			@foreach(App\Car::all() as $car)
                  <option value="{{ $car->LicencePlate }}" {!! (isset($repair) && $repair->car->LicencePlate == $car->LicencePlate ? "selected" : "") !!}>{{ $car->Model . " [" . $car->LicencePlate . "]" }}</option>
            @endforeach
        </select>
	</div>

	<div class="form-group">
		{!! Form::label('StaffId', 'Staff in charge:') !!}
		{{--!! Form::text('StaffId', isset($repair) ? null : 'Staff in charge', ['class' => 'form-control']) !!--}}
		<select name='StaffId' class="form-control">
            <option value="" disabled {!! isset($repair) ? "" : "selected" !!}> -- Select a staff member -- </option>
			@foreach(App\Staff::all() as $staff)
                  <option value="{{ $staff->Id }}" {!! (isset($repair) && $repair->staff->Id == $staff->Id ? "selected" : "") !!}>{{ $staff->Name . " [" . $staff->Id . "]" }}</option>
            @endforeach
        </select>
	</div>

	<div class="form-group">
			{!! Form::hidden('Ongoing', 0) !!}
			{!! Form::checkbox('Ongoing', 1) !!}
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
		{!! Form::text('StartDate', isset($repair) ? $repair->StartDate->toDateString() : null, ['class' => 'form-control', 'placeholder' => 'When the repair will start (preferably today)', "data-date-format"=>"yyyy-mm-dd", 'data-date-autoclose' => true, 'data-date-start-date' => 'today']) !!}
        </div>
	</div>

	<div class="form-group">
		{!! Form::label('EndDate', 'Expected End Date') !!}
		<div class="input-group">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
		{!! Form::text('EndDate', isset($repair) ? $repair->EndDate->toDateString() : null, ['class' => 'form-control', 'placeholder' => 'When we expect the repair to be done', "data-date-format"=>"yyyy-mm-dd", 'data-date-autoclose' => true, 'data-date-start-date' => 'today']) !!}
        </div>
	</div>

	<div class="form-group">
		{!! Form::label('Cost', 'Cost') !!}
		{!! Form::text('Cost', null, ['class' => 'form-control', 'placeholder' => 'Cost']) !!}
	</div>

	<div class="form-group">
		{!! Form::hidden('Paid', 0) !!}
		{!! Form::checkbox('Paid', 1) !!}
		{!! Form::label('Paid', 'Paid?') !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>
<script> $(new function() {
$("input[name$=Date]").datepicker();

var frm = $('.modal-dialog form');
frm.submit(function (ev) {
	        // Error...
    ev.preventDefault();
	$(".form-group").removeClass("has-error");
    $.ajax({
        type: frm.attr('method'),
        url: frm.attr('action'),
        data: frm.serialize(),
        success: function (data) {
	        //ev.target.submit();
	        location.reload(true);
        },
	    error: function(data){
	        var errors = data.responseJSON;
	        if (!errors) return;
	        $.each(errors, function(index, value) {
	            $.gritter.add({
	                title: 'Error: ' + index,
	                text: value
	            });
	        });
	        $.each(errors, function(index, value) {
	        	$("[name=" + index + "]").closest(".form-group").addClass("has-error");
	        });
	    }
    });
});
});</script>