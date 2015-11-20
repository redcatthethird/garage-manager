@extends('layouts.master')

@section('title', 'List of users')

@section('content-header')
<h1>
  List of users
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Users</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><small>Users</small></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="main-table" class="table table-bordered table-hover">
          <thead>
            <tr>
				<th>Name</th>
				<th>Email</th>
				<th>Delete</th>
            </tr>
          </thead>
          <tbody>
		    @foreach ($users as $user)
			<tr>
				<td>{{$user['name']}}</td>
				<td>{{$user['email']}}</td>

				<td>{!! Form::open(['route' => ['users.destroy', $user['id']], 'method' => 'DELETE']) !!}
					{!! Form::submit('Delete', ['class' => "btn btn-danger"]) !!}
					{!! Form::close() !!}</td>
			</tr>
			@endforeach
          </tbody>
          <tfoot>
            <tr>
				<th>Name</th>
				<th>Email</th>
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