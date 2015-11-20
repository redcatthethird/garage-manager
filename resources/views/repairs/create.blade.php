<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h2 class="modal-title" id="modalCreateLabel">Add new repair</h2>
</div>
{!! Form::model(new App\Repair, ['route' => ['repairs.store']]) !!}
	@include('repairs/partials/_form', ['submit_text' => 'Add repair'])
{!! Form::close() !!}