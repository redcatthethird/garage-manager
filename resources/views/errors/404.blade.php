@extends('layouts.master')

@section('title', '404 Not found')

@section('extra-head')
<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

<style>
    .container {
        font-weight: 100;
        font-family: 'Lato';
        display: table;
        text-align: center;
    }

    .content {
        display: table-cell;
        vertical-align: middle;
        text-align: center;
    }

    .title {
        display: inline-block;
        font-size: 72px;
        margin-bottom: 40px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="content">
        <div class="title">Sorry, the page you are looking for could not be found.</div>
    </div>
</div>
@endsection