@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')

@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
        <div>{{ $segmentPoints->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$segmentPoints->firstItem()}} to {{$segmentPoints->lastItem()}} points of {{$segmentPoints->total()}}</div><br>
          <div class="box">
          
            <div class="box-header">
              <h3 class="box-title">Segment Points</h3>
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
                  <th>Track Segment ID</th>
                  <th>Trip Name</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Elevation</th>
                  <th>Time</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                </tr>
                @foreach($segmentPoints as $point)
                <tr>
                  <td>{{ $point->id }}</td>
                  <td>{{ $point->track_segment_id }}</td>
                  <td>{{ $point->trackSegment->tripTrack->trip->name }}</td>
                  <td>{{ $point->latitude }}</td>
                  <td>{{ $point->longitude }}</td>
                  <td>{{ $point->elevation }}</td>
                  <td>{{ $point->time }}</td>
                  <td>{{ $point->created_at->toFormattedDateString() }}</td>
                  <td>{{ $point->updated_at->toFormattedDateString() }}</td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div>{{ $segmentPoints->appends(Request::except('page'))->links() }}</div>
            <div>Shows {{$segmentPoints->firstItem()}} to {{$segmentPoints->lastItem()}} points of {{$segmentPoints->total()}}</div>
          <!-- /.box -->
        </div>
@stop