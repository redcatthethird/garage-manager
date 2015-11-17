@include ('head', ['title' => "Add new car"])

<h2>Add new car </h2>

{!! Form::model(new App\Car, ['route' => ['cars.store']]) !!}
	@include('cars/partials/_form', ['submit_text' => 'Add car'])
{!! Form::close() !!}

@include ('foot')