<div class="modal-body">
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
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>
