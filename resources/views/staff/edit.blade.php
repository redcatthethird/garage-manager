@include ('head', ['title' => "Edit staff member"])

<h2>Edit staff member</h2>

{!! Form::model($staff, ['method' => 'PATCH', 'route' => ['staff.update', $staff->Id]]) !!}
	@include('staff/partials/_form', ['submit_text' => 'Edit staff'])
{!! Form::close() !!}

@include ('foot')