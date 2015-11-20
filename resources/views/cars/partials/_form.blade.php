<div class="modal-body">
	<div class="form-group">
		{!! Form::label('LicencePlate', 'Licence plate:') !!}
		{!! Form::text('LicencePlate', isset($car) ? null : 'Licence plate', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ClientId', 'Client:') !!}
		{{--!! Form::text('ClientId', isset($car) ? null : 'Client', ['class' => 'form-control']) !!--}}

		<select name='ClientId' value="{{ isset($car) ? null : 'Client' }}" class="form-control">
			@foreach(App\Client::all() as $client)
                  <option value="{{ $client->Id }}">{{ $client->Name . " [" . $client->Id . "]" }}</option>
            @endforeach
        </select>
	</div>
	<div class="form-group">
		{!! Form::label('Model', 'Model:') !!}
		{!! Form::text('Model', isset($car) ? null : 'Model', ['class' => 'form-control']) !!}
	</div>
</div>

<div class="form-group modal-footer">
	{!! Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => "modal"]) !!}
	{!! Form::submit($submit_text, ['class' => 'btn btn-success']) !!}
</div>