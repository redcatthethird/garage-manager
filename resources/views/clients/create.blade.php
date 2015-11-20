<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalLabel">Add new client</h2>
</div>
{!! Form::model(new App\Client, ['route' => ['clients.store']]) !!}
	@include('clients/partials/_form', ['submit_text' => 'Add client'])
{!! Form::close() !!}