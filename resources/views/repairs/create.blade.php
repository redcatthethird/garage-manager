@include ('head', ['title' => "Add new a new repair"])

<h2>Add new repair</h2>

{!! Form::model(new App\Repair, ['route' => ['repairs.store']]) !!}
	@include('repairs/partials/_form', ['submit_text' => 'Add repair'])
{!! Form::close() !!}

@include ('foot')