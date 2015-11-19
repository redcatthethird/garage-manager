@extends('layouts.master')

@section('title', 'List of '.@yield('table-name'))

@section('content-header')
<h1>
  <small>List of</small>
  @yield('table-name')
  <small><a href="{{ URL::route('@yield('table-name').create') }}">Create</a></small>
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">@yield('table-name')</li>
</ol>
@endsection

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Hover Data Table</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="main-table" class="table table-bordered table-hover">
          <thead>
            <tr>
              @yield('table-header')
            </tr>
          </thead>
          <tbody>
            @yield('table-content')
          </tbody>
          <tfoot>
            <tr>
              @yield('table-header')
            </tr>
          </tfoot>
        </table>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection

@section('table-id', 'main-table')