@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
            <div>{{ $trips->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$trips->firstItem()}} to {{$trips->lastItem()}} trips of {{$trips->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Trips</h3>
              @include('layouts.messages')
              @include('layouts.errors')
              <div class="box-tools">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>.GPX File</th>
                  <th>Show Trip Map</th>
                  <th>Tracks</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                @foreach($trips as $trip)
                <tr>
                  <td>{{ $trip->id }}</td>
                  <td>{{ $trip->name }}</td>
                  <td><a href="{{ route('gpx.download', ['name' => $trip->gpx_name]) }}">{{ $trip->gpx_name }}</a></td>
                  <td><a href="{{ route('segment.select', ['trip_id' => $trip->id]) }}"><i class="fa fa-map-o"></i> Select Segment </a></td>
                  <td><a href="{{ route('track.select', ['trip_id' => $trip->id]) }}"><i class="fa fa-map-marker"></i></a></td>
                  <td>{{ $trip->created_at->toFormattedDateString() }}</td>
                  <td>{{ $trip->updated_at->toFormattedDateString() }}</td>
                  <td><a href="{{ route('trip.edit',['id' => $trip->id]) }}"><i class="fa fa-pencil"></i></a></td>
                  <td><a href="{{ route('trip.delete',['id' => $trip->id]) }}"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>{{ $trips->appends(Request::except('page'))->links() }}</div>
          <div>Shows {{$trips->firstItem()}} to {{$trips->lastItem()}} trips of {{$trips->total()}}</div>
          <!-- /.box -->
        </div>
@stop