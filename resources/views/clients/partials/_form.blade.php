<div class="modal-body">
	<div class="form-group">
		{!! Form::label('Name', 'Name:') !!}
		{!! Form::text('Name', isset($client) ? null : 'Name', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Address', 'Address:') !!}
		{!! Form::text('Address', isset($client) ? null : 'Address', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('PhoneNo', 'Phone number:') !!}
		{!! Form::text('PhoneNo', isset($client) ? null : 'Phone number', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('Email', 'E-mail:') !!}
		{!! Form::text('Email', isset($client) ? null : "E-mail", ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>
