@include ('head', ['title' => "Add new staff member"])

<h2>Add new staff member</h2>

{!! Form::model(new App\Staff, ['route' => ['staff.store']]) !!}
	@include('staff/partials/_form', ['submit_text' => 'Add staff'])
{!! Form::close() !!}

@include ('foot')