<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalEditLabel">Edit car</h2>
</div>
{!! Form::model($car, ['method' => 'PATCH', 'route' => ['cars.update', $car->LicencePlate]]) !!}
	@include('cars/partials/_form', ['submit_text' => 'Edit car'])
{!! Form::close() !!}