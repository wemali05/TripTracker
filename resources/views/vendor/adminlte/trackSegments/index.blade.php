@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
        <div>{{ $trackSegments->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$trackSegments->firstItem()}} to {{$trackSegments->lastItem()}} segments of {{$trackSegments->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Track Segments</h3>
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
                  <th>Trip Track ID</th>
                  <th>Trip Name</th>
                  <th>Show Trip Map</th>
                  <th>Points</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
                @foreach($trackSegments as $segment)
                <tr>
                  <td>{{ $segment->id }}</td>
                  <td>{{ $segment->trip_track_id }}</td>
                  <td>{{ $segment->tripTrack->trip->name }}</td>
                  <td><a href="{{ route('map.show', ['segment_id' => $segment->id]) }}"><i class="fa fa-map-o"></i> Show Map </a></td>
                  <td><a href="{{ route('point.select', ['segment_id' => $segment->id]) }}"><i class="fa fa-map-marker"></i></a></td>
                  <td>{{ $segment->created_at->toFormattedDateString() }}</td>
                  <td>{{ $segment->updated_at->toFormattedDateString() }}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>{{ $trackSegments->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$trackSegments->firstItem()}} to {{$trackSegments->lastItem()}} segments of {{$trackSegments->total()}}</div>
          <!-- /.box -->
        </div>
@stop