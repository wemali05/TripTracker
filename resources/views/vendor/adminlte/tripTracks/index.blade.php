@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
        <div>{{ $tripTracks->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$tripTracks->firstItem()}} to {{$tripTracks->lastItem()}} tracks of {{$tripTracks->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Trip Tracks</h3>
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
                  <th>Trip ID</th>
                  <th>Trip Name</th>
                  <th>Show Trip Map</th>
                  <th>Segments</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
                @foreach($tripTracks as $track)
                <tr>
                  <td>{{ $track->id }}</td>
                  <td>{{ $track->trip_id }}</td>
                  <td>{{ $track->trip->name }}</td>
                  <td><a href="{{ route('segment.select', ['track_id' => $track->id]) }}"><i class="fa fa-map-o"></i> Select Segment </a></td>
                  <td><a href="{{ route('segment.select', ['track_id' => $track->id]) }}"><i class="fa fa-map-marker"></i></a></td>
                  <td>{{ $track->created_at->toFormattedDateString() }}</td>
                  <td>{{ $track->updated_at->toFormattedDateString() }}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            <div>{{ $tripTracks->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$tripTracks->firstItem()}} to {{$tripTracks->lastItem()}} tracks of {{$tripTracks->total()}}</div>
          <!-- /.box -->
        </div>
@stop