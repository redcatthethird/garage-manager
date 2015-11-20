<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalCreateLabel">Add new car</h2>
</div>
{!! Form::model(new App\Car, ['route' => ['cars.store']]) !!}
	@include('cars/partials/_form', ['submit_text' => 'Add car'])
{!! Form::close() !!}