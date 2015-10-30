@include ('head', ['title' => "List of cars"])
<h1>List of cars</h1>
</br>
<table border="1">
	<tr>
		<th>Plate Number</th>
		<th>Owner</th>
		<th>Model</th>
	</tr>
	@for ($i = 0; $i < $count; $i++)
	<tr>
		<td><a href="{{ URL::route('showCar', array($cars[$i]['LicencePlate'])) }}">{{ $cars[$i]['LicencePlate'] }}</a></td>
		<td><a href="{{ URL::route('showClient', array($cars[$i]['StaffID'])) }}">{{ $cars[$i]['ClientID'] }}</a></td>
		<td>{{$cars[$i]['Model']}}</td>
	</tr>
	@endfor
</table>
@include ('foot')