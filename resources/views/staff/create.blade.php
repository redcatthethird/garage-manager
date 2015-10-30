@include ('head', ['title' => "Add new staff member"])

{!! Form::model(new App\Staff, ['route' => ['staff.store']]) !!}
	@include('staff/partials/_form', ['submit_text' => 'Add staff'])
{!! Form::close() !!}

@include ('foot')