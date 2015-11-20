<div class="modal-body">
	<div class="form-group">
		{!! Form::label('LicencePlate', 'Licence plate:') !!}
		{!! Form::text('LicencePlate', isset($car) ? null : 'Licence plate', ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('ClientId', 'Client:') !!}
		<div class="row">
			
					<div class="col-xs-8">{!! Form::text('ClientId', isset($car) ? null : 'Client', ['class' => 'form-control']) !!}</div>
					<div class="col-xs-4">
						<a href="{{ URL::route('clients.create')}}" class="btn btn-success" data-toggle="modal" data-target="#innerCarModal">Add new client</a>
					</div>
					
				<!-- Modal -->
				<div class="modal fade" id="innerCarModal" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel">
				  <div class="modal-dialog" role="document"><div class="modal-content"></div>
				  </div>
				</div><!-- modal -->
		</div>
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
