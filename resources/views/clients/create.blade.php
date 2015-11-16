@include ('head', ['title' => "Add new client"])

<h2>Add new client</h2>

{!! Form::model(new App\Client, ['route' => ['clients.store']]) !!}
	@include('clients/partials/_form', ['submit_text' => 'Add client'])
{!! Form::close() !!}

@include ('foot')