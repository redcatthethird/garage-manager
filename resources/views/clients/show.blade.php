@include ('head', ['title' => "Repairs on car ".$car->LicencePlate])
<h1>Repairs on car {{ $car->LicencePlate }}</h1>

		<a href="{{ URL::route('cars.show', array($car['LicencePlate'])) }}">{{ $car['LicencePlate'] }}</a></br>
		<a href="{{ URL::route('clients.show', array($car['ClientId'])) }}">{{ $car['ClientId'] }}</a></br>
		{{$car['Model']}}</td></br>


		@if (Auth::user()->isAdmin)
			<a href="{{ URL::route('cars.edit', array($car['LicencePlate'])) }}">Edit</a></br>
			{!! Form::open(['route' => ['cars.destroy', $car['LicencePlate']], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete') !!}
			{!! Form::close() !!}
			</br>
		@endif
<table border="1">
	<tr>
		<th>ID</th>
		<th>Plate Number</th>
		<th>Staff in charge</th>
		<th>Ongoing?</th>
		<th>Type</th>
		<th>Comments</th>
		<th>Start Date</th>
		<th>Expected End Date</th>
		<th>Cost</th>
		<th>Paid?</th>
		<th>Edit</th>
		<th>Delete</th>

	</tr>
	@foreach ($car->repairs as $repair)
	<tr>
		<td>{{$repair['Id']}}</td>
		<td><a href="{{ URL::route('cars.show', array($repair['LicencePlate'])) }}">{{ $repair['LicencePlate'] }}</a></td>
		@if (Auth::user()->isAdmin)
			<td><a href="{{ URL::route('staff.show', array($repair['StaffId'])) }}">{{ $repair['StaffId'] }}</a></td>
		@else
			<td>{{ $repair['StaffId'] }}</td>
		@endif
		<td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td>
		<td>{{ $repair['Type'] }}</td>
		<td>{{ $repair['Comments'] }}</td>
		<td>{{ $repair['StartDate'] }}</td>
		<td>{{ $repair['EndDate'] }}</td>
		<td>{{ '£' . $repair['Cost'] }}</td>
		<td>{{ $repair['Paid'] ? 'Yes' : 'No' }}</td>

		<td><a href="{{ URL::route('repairs.edit', array($repair['Id'])) }}">Edit</a></td>


		<td>{!! Form::open(['route' => ['repairs.destroy', $repair['Id']], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete') !!}
			{!! Form::close() !!}</td>
	</tr>
	@endforeach
</table>
@include ('foot')