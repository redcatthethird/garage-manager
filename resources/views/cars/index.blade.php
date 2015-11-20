@extends('layouts.master')

@section('title', 'List of cars')

@section('content-header')
<h1>List of cars</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Cars</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><strong><a href="{{ URL::route('cars.create') }}" class="btn btn-success" data-toggle="modal" data-target="#Modal">Add car</a></strong></h3>
        <h3 class="box-title"><strong><a href="{{ URL::route('clients.create') }}" class="btn btn-success" data-toggle="modal" data-target="#clientModal">Add client</a></strong></h3>
      </div><!-- /.box-header -->


		<!-- Modal -->
		<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel">
		  <div class="modal-dialog modal-lg" role="document"><div class="modal-content"></div>
		  </div>
		</div><!-- modal -->
		<!-- Modal -->
		<div class="modal fade" id="clientModal" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel">
		  <div class="modal-dialog" role="document"><div class="modal-content"></div>
		  </div>
		</div><!-- modal -->
      <div class="box-body">

      <div class="box-body">
        <table id="main-table" class="table table-bordered table-hover">
          <thead>
            <tr>
				<th>Plate Number</th>
				<th>Owner</th>
				<th>Model</th>

				@if (Auth::user()->isAdmin)
					<th>Edit</th>
					<th>Delete</th>
				@endif
            </tr>
          </thead>
          <tbody>
		    @for ($i = 0; $i < $count; $i++)
			<tr>
				<td><a href="{{ URL::route('cars.show', array($cars[$i]['LicencePlate'])) }}">{{ $cars[$i]['LicencePlate'] }}</a></td>
				<td><a href="{{ URL::route('clients.show', array($cars[$i]->ClientId)) }}">{{ $cars[$i]->owner->Name . ' [' . $cars[$i]->ClientId . ']' }}</a></td>
				<td>{{$cars[$i]['Model']}}</td>

				@if (Auth::user()->isAdmin)
					<td><a href="{{ URL::route('cars.edit', array($cars[$i]['LicencePlate'])) }}" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$cars[$i]['LicencePlate']}}">Edit</a></td>

				<div class="modal fade" id="Modal{{$cars[$i]['LicencePlate']}}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel">
				  <div class="modal-dialog" role="document"><div class="modal-content"></div>
				  </div>
				</div><!-- modal -->

					<td>{!! Form::open(['route' => ['cars.destroy', $cars[$i]['LicencePlate']], 'method' => 'DELETE']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					{!! Form::close() !!}</td>
				@endif
			@endfor
          </tbody>
          <tfoot>
            <tr>
				<th>Plate Number</th>
				<th>Owner</th>
				<th>Model</th>

				@if (Auth::user()->isAdmin)
					<th>Edit</th>
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