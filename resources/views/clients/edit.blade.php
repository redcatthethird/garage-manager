<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalEditLabel">Edit client</h2>
</div>
{!! Form::model($client, ['method' => 'PATCH', 'route' => ['clients.update', $client->Id]]) !!}
	@include('clients/partials/_form', ['submit_text' => 'Edit client'])
{!! Form::close() !!}