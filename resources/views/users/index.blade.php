@include ('head', ['title' => 'List of users'])
<h1>List of users</h1>
<table border='1' class="table a">
	<tr class="table th">
		<th>Name</th>
		<th>Email</th>
		<th>Delete</th>
	</tr>

	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td>{{$user[$i]['name']}}</td>
		<td>{{$user[$i]['email']}}</td>

		<td>{!! Form::open(['route' => ['users.destroy', $user[$i]['id']], 'method' => 'DELETE']) !!}
			{!! Form::submit('Delete') !!}
			{!! Form::close() !!}</td>
	</tr>

	@endfor
</table>
@include ('foot')