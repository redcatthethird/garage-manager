@include ('head', ['title' => "List of repairs"])
<h1>List of repairs</h1>
</br>
<a href="{{ URL::route('staff.create') }}">Create</a>
</br>
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
	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('repairs.show', array($repairs[$i]['Id'])) }}">{{$repairs[$i]['Id']}}</a></td>
		<td><a href="{{ URL::route('cars.show', array($repairs[$i]['LicencePlate'])) }}">{{ $repairs[$i]['LicencePlate'] }}</a></td>
		<td><a href="{{ URL::route('staff.show', array($repairs[$i]['StaffId'])) }}">{{ $repairs[$i]['StaffId'] }}</a></td>
		<td>{{ $repairs[$i]['Ongoing'] ? 'Yes' : 'No' }}</td>
		<td>{{ $repairs[$i]['Type'] }}</td>
		<td>{{ $repairs[$i]['Comments'] }}</td>
		<td>{{ $repairs[$i]['StartDate'] }}</td>
		<td>{{ $repairs[$i]['EndDate'] }}</td>
		<td>{{ '£' . $repairs[$i]['Cost'] }}</td>
		<td>{{ $repairs[$i]['Paid'] ? 'Yes' : 'No' }}</td>
		
		<td><a href="{{ URL::route('repairs.edit', array($repairs[$i]['Id'])) }}">Edit</a></td>
		
		<td>{!! Form::open(['route' => ['repairs.destroy', $repairs[$i]['Id']], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete') !!}
			{!! Form::close() !!}</td>
	</tr>
	@endfor
</table>
@include ('foot')