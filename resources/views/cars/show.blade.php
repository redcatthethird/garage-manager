
@extends('layouts.master')

@section('title', "Repairs on car ".$car->LicencePlate)

@section('content-header')
<h1>Repairs on car <em>{{ $car->LicencePlate }}</em></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Cars</a></li>
  <li class="active">{{ $car->LicencePlate }}</li>
</ol>

@if (Auth::user()->isAdmin)
	<br/>
	<div class="row">
		<div class="col-xs-4">
			{!! Form::open(['route' => ['cars.destroy', $car['LicencePlate']], 'method' => 'DELETE']) !!}
				<div class="btn-group">
					<a href="{{ URL::route('cars.edit', array($car['LicencePlate'])) }}" class="btn btn-primary">Edit car</a>
					{!! Form::submit('Delete car', ['class' => 'btn btn-primary']) !!}
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endif
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><strong>Repairs</strong></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="main-table" class="table table-bordered table-hover">
          <thead>
            <tr>
				<th>ID</th>
				<th>Plate Number</th>
				<th>Model</th>
				<th>Client</th>
				<th>Type</th>
				<th>Comments</th>
				<th>Staff in charge</th>
				<th>Start Date</th>
				<th>Expected End Date</th>
				<th>Ongoing?</th>
				<th>Cost</th>
				<th>Paid?</th>
				<th>Edit</th>
				@if (Auth::user()->isAdmin)
					<th>Delete</th>
				@endif
            </tr>
          </thead>
          <tbody>
		    @foreach ($car->repairs as $repair)
		    <tr>
		      <td>{{$repair['Id']}}</td>
		      <td>{{ $repair['LicencePlate'] }}</td>
		      <td>{{ $repair->car->Model }}</td>
		      <td><a href="{{ URL::route('clients.show', array($repair->car->ClientId)) }}">{{ $repair->car->owner->Name . ' [' . $repair->car->owner->Id . ']' }}</a></td>
		      <td>{{ $repair['Type'] }}</td>
		      <td>{{ $repair['Comments'] }}</td>
		      @if (Auth::user()->isAdmin && $repair->staff->deleted_at === null)
		        <td><a href="{{ URL::route('staff.show', array($repair['StaffId'])) }}">{{ $repair->staff->Name . ' [' . $repair['StaffId'] . ']'  }}</a></td>
		      @else
		        <td>{{ $repair->staff->Name . ' [' . $repair['StaffId'] . ']' }}</td>
		      @endif
		      <td>{{ $repair['StartDate'] }}</td>
		      <td>{{ $repair['EndDate'] }}</td>
		      <td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td>
		      <td>{{ '£' . $repair['Cost'] }}</td>
		      <td>{{ $repair['Paid'] ? 'Yes' : 'No' }}</td>

		      <td><a href="{{ URL::route('repairs.edit', array($repair['Id'])) }}">Edit</a></td>

		      @if (Auth::user()->isAdmin)
		        <td>{!! Form::open(['route' => ['repairs.destroy', $repair['Id']], 'method' => 'DELETE']) !!}
		          {!! Form::submit('Delete') !!}
		          {!! Form::close() !!}</td>
		      @endif
		    </tr>
		    @endforeach
          </tbody>
          <tfoot>
            <tr>
				<th>ID</th>
				<th>Plate Number</th>
				<th>Model</th>
				<th>Client</th>
				<th>Type</th>
				<th>Comments</th>
				<th>Staff in charge</th>
				<th>Start Date</th>
				<th>Expected End Date</th>
				<th>Ongoing?</th>
				<th>Cost</th>
				<th>Paid?</th>
				<th>Edit</th>
				@if (Auth::user()->isAdmin)
					<th>Delete</th>
				@endif
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('table-id', 'main-table')