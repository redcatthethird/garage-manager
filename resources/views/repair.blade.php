@include ('head', ['title' => "Repair job #{{$repair[RepairID]}}"])
<h1>Repair job #{{$repair[RepairID]}}</h1>
</br>
<table border="1">
		<tr><th>ID</th><td>{{$repair['RepairID']}}</td></tr>
		<tr><th>Plate Number</th><td><a href="{{ URL::route('showCar', array($repair['LicencePlate'])) }}">{{ $repair['LicencePlate'] }}</a></td></tr>
		<tr><th>Staff in charge</th><td><a href="{{ URL::route('showStaff', array($repair['StaffID'])) }}">{{ $repair['StaffID'] }}</a></td></tr>
		<tr><th>Ongoing?</th><td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td></tr>
		<tr><th>Type</th><td>{{ $repair['Type'] }}</td></tr>
		<tr><th>Comments</th><td>{{ $repair['Comments'] }}</td></tr>
		<tr><th>Start Date</th><td>{{ $repair['StartDate'] }}</td></tr>
		<tr><th>Expected End Date</th><td>{{ $repair['EndDate'] }}</td></tr>
		<tr><th>Cost</th><td>{{ '£' . $repair['Cost'] }}</td></tr>
		<tr><th>Paid?</th><td>{{ $repair['Paid'] ? 'Yes' : 'No' }}</td></tr>
</table>
@include ('foot')