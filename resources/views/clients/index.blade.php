@include ('head', ['title' => "List of clients"])
<h1>List of clients</h1>
</br>
<table border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Address</th>
		<th>Phone Number</th>
		<th>E-mail address</th>
	</tr>
	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('showClient', array($clients[$i]['Id'])) }}">{{ $clients[$i]['Id'] }}</a></td>
		<td>{{$clients[$i]['Name']}}</td>
		<td>{{$clients[$i]['Address']}}</td>
		<td>{{$clients[$i]['PhoneNo']}}</td>
		<td>{{$clients[$i]['Email']}}</td>
	</tr>
	@endfor
</table>
@include ('foot')