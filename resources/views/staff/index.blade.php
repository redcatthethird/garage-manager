@include ('head', ['title' => 'List of staff members'])
<h1>List of staff members</h1>
</br>
<table border='1'>
	<tr>
		<th>ID</th>
		<th>Name</th>
	</tr>

	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td>{{$staff[$i]['Id']}}</td>
		<td>{{$staff[$i]['Name']}}</td>
	</tr>
	@endfor
</table>
@include ('foot')