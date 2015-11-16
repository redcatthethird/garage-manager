@include ('head', ['title' => "Edit repair"])

<h2>Edit repair</h2>

{!! Form::model($repair, ['method' => 'PATCH', 'route' => ['repairs.update', $repair->Id]]) !!}
	@include('repairs/partials/_form', ['submit_text' => 'Edit repair'])
{!! Form::close() !!}

@include ('foot')