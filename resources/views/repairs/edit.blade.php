<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalEditLabel">Edit repair</h2>
</div>
{!! Form::model($repair, ['method' => 'PATCH', 'route' => ['repairs.update', $repair->Id]]) !!}
	@include('repairs/partials/_form', ['submit_text' => 'Edit repair'])
{!! Form::close() !!}