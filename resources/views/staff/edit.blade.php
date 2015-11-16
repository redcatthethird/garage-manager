@include ('head', ['title' => "Edit car details"])

<h2>Edit car details</h2>

{!! Form::model($car, ['method' => 'PATCH', 'route' => ['cars.update', $car->LicencePlate]]) !!}
	@include('cars/partials/_form', ['submit_text' => 'Edit car'])
{!! Form::close() !!}

@include ('foot')