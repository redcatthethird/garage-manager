@include ('head', ['title' => 'List of staff members'])
<h1>List of staff members</h1>
</br>
<table border='1'>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>E-mail address</th>
	</tr>

	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('staff.show', array($staff[$i]['Id'])) }}">{{ $staff[$i]['Id'] }}</a></td>
		<td>{{$staff[$i]['Name']}}</td>
		<td>{{$staff[$i]['Address']}}</td>
		<td>{{$staff[$i]['PhoneNo']}}</td>
		<td>{{$staff[$i]['Email']}}</td>
	</tr>
	@endfor
</table>
@include ('foot')