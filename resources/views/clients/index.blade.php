@extends('layouts.master')

@section('title', 'List of clients')

@section('content-header')
<h1>
  List of clients
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Clients</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><strong><a href="{{ URL::route('clients.create') }}">Create</a></strong></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="main-table" class="table table-bordered table-hover">
          <thead>
            <tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>E-mail address</th>
				@if (Auth::user()->isAdmin)
					<th>Edit</th>
					<th>Delete</th>
				@endif
            </tr>
          </thead>
          <tbody>
		    @for ($i = 0; $i < $count; $i++)
			<tr>
				<td><a href="{{ URL::route('clients.show', array($clients[$i]['Id'])) }}">{{ $clients[$i]['Id'] }}</a></td>
				<td><a href="{{ URL::route('clients.show', array($clients[$i]['Id'])) }}">{{$clients[$i]['Name']}}</a></td>
				<td>{{$clients[$i]['Address']}}</td>
				<td>{{$clients[$i]['PhoneNo']}}</td>
				<td>{{$clients[$i]['Email']}}</td>

				<td><a href="{{ URL::route('clients.edit', array($clients[$i]['Id'])) }}" class="btn btn-primary">Edit</a></td>

				<td>{!! Form::open(['route' => ['clients.destroy', $clients[$i]['Id']], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete', ['class' => 'btn btn-primary']) !!}
					{!! Form::close() !!}</td>
			</tr>
			@endfor
          </tbody>
          <tfoot>
            <tr>
				<th>ID</th>
				<th>Name</th>
				<th>Address</th>
				<th>Phone Number</th>
				<th>E-mail address</th>
				<th>Edit</th>
				<th>Delete</th>
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('table-id', 'main-table')