@include ('head', ['title' => "Repairs supervised by staff member ".$staff->Name." [".$staff->Id."]"])
<h1>Repairs supervised by staff member {{ $staff->Name }} [{{$staff->Id}}]</h1>

		<a href="{{ URL::route('staff.show', array($staff['Id'])) }}">{{ $staff['Id'] }}</a><br/>
		{{$staff['Name']}}<br/>
		{{$staff['Address']}}<br/>
		{{$staff['PhoneNo']}}<br/>
		{{$staff['Email']}}<br/>

		<a href="{{ URL::route('staff.edit', array($staff['Id'])) }}">Edit</a><br/>

		{!! Form::open(['route' => ['staff.destroy', $staff['Id']], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete') !!}
		{!! Form::close() !!}<br/>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Plate Number</th>
		<th>Model</th>
		<th>Client</th>
		<th>Type</th>
		<th>Comments</th>
		<th>Staff in charge</th>
		<th>Start Date</th>
		<th>Expected End Date</th>
		<th>Ongoing?</th>
		<th>Cost</th>
		<th>Paid?</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	@foreach ($staff->repairs as $repair)
	<tr>
		<td>{{$repair['Id']}}</td>
		<td><a href="{{ URL::route('cars.show', array($repair['LicencePlate'])) }}">{{ $repair['LicencePlate'] }}</a></td>
		<td>{{ $repair->car->Model }}</td>
		<td><a href="{{ URL::route('clients.show', array($repair->car->ClientId)) }}">{{ $repair->car->owner->Name . ' [' . $repair->car->ClientId . ']' }}</a></td>
		<td>{{ $repair['Type'] }}</td>
		<td>{{ $repair['Comments'] }}</td>
		<td>{{ $repair->staff->Name . '(' . $repair['StaffId'] . ')' }}</td>
		<td>{{ $repair['StartDate'] }}</td>
		<td>{{ $repair['EndDate'] }}</td>
		<td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td>
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