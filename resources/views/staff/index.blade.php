@include ('head', ['title' => 'List of staff members'])
<h1>List of staff members</h1>
</br>
<table border='1' class="table a">
	<tr class="table th">
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>E-mail address</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>

	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('staff.show', array($staff[$i]['Id'])) }}">{{ $staff[$i]['Id'] }}</a></td>
		<td>{{$staff[$i]['Name']}}</td>
		<td>{{$staff[$i]['Address']}}</td>
		<td>{{$staff[$i]['PhoneNo']}}</td>
		<td>{{$staff[$i]['Email']}}</td>
		<td><a href="{{ URL::route('staff.edit', array($staff[$i]['Id'])) }}">Edit</a></td>
		<td><a href="{{ URL::route('staff.destroy', array($staff[$i]['Id'])) }}">Delete</a></td>
	</tr>
	@endfor
</table>
@include ('foot')