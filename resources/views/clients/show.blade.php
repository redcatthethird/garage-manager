@extends('layouts.master')

@section('title', "Repairs done for client ".$client->Name." [".$client->Id."]")

@section('content-header')
<h1>Repairs done for client <em>{{ $client->Name }} [{{$client->Id}}]</em></h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li><a href="#">Clients</a></li>
  <li class="active">{{ $client->Name }}</li>
</ol>

@if (Auth::user()->isAdmin)
	<br/>
	<div class="row">
		<div class="col-xs-4">
			{!! Form::open(['route' => ['clients.destroy', $client['Id']], 'method' => 'DELETE']) !!}
				<div class="btn-group">
					<a href="{{ URL::route('clients.edit', array($client['Id'])) }}" class="btn btn-primary" data-toggle="modal" data-target="#showModal">Edit client</a>

				<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
				  <div class="modal-dialog" role="document"><div class="modal-content"></div>
				  </div>
				</div><!-- modal -->
					{!! Form::submit('Delete client', ['class' => 'btn btn-danger']) !!}
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
			@foreach ($client->cars as $car)
			    @foreach ($car->repairs as $repair)
			    <tr>
			      <td>{{$repair['Id']}}</td>
			      <td><a href="{{ URL::route('cars.show', array($repair['LicencePlate'])) }}">{{ $repair['LicencePlate'] }}</a></td>
			      <td>{{ $repair->car->Model }}</td>
			      <td>{{ $repair->car->owner->Name . ' [' . $repair->car->owner->Id . ']' }}</td>
			      <td>{{ $repair['Type'] }}</td>
			      <td>{{ $repair['Comments'] }}</td>
			      @if (Auth::user()->isAdmin && $repair->staff->deleted_at === null)
			        <td><a href="{{ URL::route('staff.show', array($repair['StaffId'])) }}">{{ $repair->staff->Name . ' [' . $repair['StaffId'] . ']'  }}</a></td>
			      @else
			        <td>{{ $repair->staff->Name . ' [' . $repair['StaffId'] . ']' }}</td>
			      @endif
			      <td>{{ $repair['StartDate']->format("j M Y") }}</td>
			      <td>{{ $repair['EndDate']->format("j M Y") }}</td>
			      <td>{{ $repair['Ongoing'] ? 'Yes' : 'No' }}</td>
			      <td>{{ '£' . $repair['Cost'] }}</td>
			      <td>{{ $repair['Paid'] ? 'Yes' : 'No' }}</td>

		      <td><a href="{{ URL::route('repairs.edit', array($repair['Id'])) }}" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$repair['Id']}}">Edit</a></td>

				<div class="modal fade" id="Modal{{$repair['Id']}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
				  <div class="modal-dialog" role="document"><div class="modal-content"></div>
				  </div>
				</div><!-- modal -->

			      @if (Auth::user()->isAdmin)
			        <td>{!! Form::open(['route' => ['repairs.destroy', $repair['Id']], 'method' => 'DELETE']) !!}
			          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			          {!! Form::close() !!}</td>
			      @endif
			    </tr>
			    @endforeach
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