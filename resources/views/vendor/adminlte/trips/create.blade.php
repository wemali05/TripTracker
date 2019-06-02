@extends('adminlte::page')
@section('title', 'DIG_Trip_Tracker')
@section('content_header')
@stop
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Trip</h3>
        </div>
        @include('layouts.errors')
        @include('layouts.messages')
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('trip.store') }}" method="POST" enctype="multipart/form-data">
          <div class="box-body">
          
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Provide name">
            </div>

            <div class="form-group">
                <label>Upload .GPX file</label>
                <input type="file" name="gpx">
            </div>
       
          </div>

          {!! csrf_field() !!}
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Add Trip</button>
          </div>
        </form>
      </div>
    </div>
    </div>
@stop