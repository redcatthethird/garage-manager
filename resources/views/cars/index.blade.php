@include ('head', ['title' => "List of cars"])
<h1>List of cars</h1>
</br>
<a href="{{ URL::route('cars.create') }}">Add car</a>
</br>
<table border='1' class="table a">
	<tr class="table th">
		<th>Plate Number</th>
		<th>Owner</th>
		<th>Model</th>

		@if (Auth::user()->isAdmin)
			<th>Edit</th>
			<th>Delete</th>
		@endif
	</tr>

	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('cars.show', array($cars[$i]['LicencePlate'])) }}">{{ $cars[$i]['LicencePlate'] }}</a></td>
		<td><a href="{{ URL::route('clients.show', array($cars[$i]->ClientId)) }}">{{ $cars[$i]->owner->Name . ' [' . $cars[$i]->ClientId . ']' }}</a></td>
		<td>{{$cars[$i]['Model']}}</td>

		@if (Auth::user()->isAdmin)
			<td><a href="{{ URL::route('cars.edit', array($cars[$i]['LicencePlate'])) }}">Edit</a></td>

			<td>{!! Form::open(['route' => ['cars.destroy', $cars[$i]['LicencePlate']], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete') !!}
			{!! Form::close() !!}</td>
		@endif
	@endfor
</table>
@include ('foot')