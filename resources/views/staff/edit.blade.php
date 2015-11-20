<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalEditLabel">Edit staff member</h2>
</div>
{!! Form::model($staff, ['method' => 'PATCH', 'route' => ['staff.update', $staff->Id]]) !!}
	@include('staff/partials/_form', ['submit_text' => 'Edit staff'])
{!! Form::close() !!}