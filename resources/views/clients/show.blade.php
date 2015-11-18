@include ('head', ['title' => "Repairs on client ".$client->Name." [".$client->Id."]"])
<h1>Repairs on client {{ $client->Name }} [{{$client->Id}}]</h1>


		<a href="{{ URL::route('clients.show', array($client['Id'])) }}">{{ $client['Id'] }}</a><br/>
		<a href="{{ URL::route('clients.show', array($client['Id'])) }}">{{$client['Name']}}</a><br/>
		{{$client['Address']}}<br/>
		{{$client['PhoneNo']}}<br/>
		{{$client['Email']}}<br/>

		@if (Auth::user()->isAdmin)
			<a href="{{ URL::route('clients.edit', array($client['Id'])) }}">Edit</a><br/>

			{!! Form::open(['route' => ['clients.destroy', $client['Id']], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete') !!}
			{!! Form::close() !!}<br/>
		@endif
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
		@if (Auth::user()->isAdmin)
			<th>Delete</th>
		@endif
	</tr>
	@foreach ($client->cars as $car)
		@foreach ($car->repairs as $repair)
		<tr>
			<td>{{$repair['Id']}}</td>
			<td><a href="{{ URL::route('cars.show', array($repair['LicencePlate'])) }}">{{ $repair['LicencePlate'] }}</a></td>
			<td>{{ $repair->car->Model }}</td>
			<td>{{ $repair->car->owner->Name . ' [' . $repair->car->ClientId . ']' }}</td>
			<td>{{ $repair['Type'] }}</td>
			<td>{{ $repair['Comments'] }}</td>
			@if (Auth::user()->isAdmin && $repair->staff->deleted_at === null)
				<td><a href="{{ URL::route('staff.show', array($repair['StaffId'])) }}">{{ $repair->staff->Name . ' [' . $repair['StaffId'] . ']'  }}</a></td>
			@else
				<td>{{ $repair->staff->Name . '(' . $repair['StaffId'] . ')' }}</td>
			@endif
			<td>{{ $repair['StartDate'] }}</td>
			<td>{{ $repair['EndDate'] }}</td>
			<td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td>
			<td>{{ '£' . $repair['Cost'] }}</td>
			<td>{{ $repair['Paid'] ? 'Yes' : 'No' }}</td>

			<td><a href="{{ URL::route('repairs.edit', array($repair['Id'])) }}">Edit</a></td>


			@if (Auth::user()->isAdmin)
				<td>{!! Form::open(['route' => ['repairs.destroy', $repair['Id']], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete') !!}
					{!! Form::close() !!}</td>
			@endif
		</tr>
		@endforeach
	@endforeach
</table>
@include ('foot')