<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalCreateLabel">Add new staff member</h2>
</div>
{!! Form::model(new App\Staff, ['route' => ['staff.store']]) !!}
	@include('staff/partials/_form', ['submit_text' => 'Add staff'])
{!! Form::close() !!}