@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')
@stop

@section('content')
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Trip</h3>
            </div>
              @include('layouts.messages')
              @include('layouts.errors')
            <!-- /.box-header -->
            <div class="box-body">

            <form mag="form" action="{{ route('trip.update',['id' => $trip->id]) }}" method="POST">
              <!-- text input -->
                
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value ="{{$trip->mac}}" placeholder="Provide new trip name">
            </div>
              
            <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Update Trip">
            </div>

            {!! csrf_field() !!}
          </form>
        </div>
        <!-- /.box-body -->
      </div>
@stop
