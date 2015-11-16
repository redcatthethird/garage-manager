@include ('head', ['title' => "List of clients"])
<h1>List of clients</h1>
</br>
<a href="{{ URL::route('clients.create') }}">Create</a>
</br>
<table border="1" class="table a">
	<tr class="table th">
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>E-mail address</th>
		@if (Auth::user()->isAdmin)
			<th>Edit</th>
			<th>Delete</th>
		@endif
	</tr>
	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('clients.show', array($clients[$i]['Id'])) }}">{{ $clients[$i]['Id'] }}</a></td>
		<td><a href="{{ URL::route('clients.show', array($clients[$i]['Id'])) }}">{{$clients[$i]['Name']}}</a></td>
		<td>{{$clients[$i]['Address']}}</td>
		<td>{{$clients[$i]['PhoneNo']}}</td>
		<td>{{$clients[$i]['Email']}}</td>

		@if (Auth::user()->isAdmin)
			<td><a href="{{ URL::route('clients.edit', array($clients[$i]['Id'])) }}">Edit</a></td>

			<td>{!! Form::open(['route' => ['clients.destroy', $clients[$i]['Id']], 'method' => 'DELETE']) !!}
				{!! Form::submit('Delete') !!}
			{!! Form::close() !!}</td>
		@endif

	</tr>
	@endfor
</table>
@include ('foot')