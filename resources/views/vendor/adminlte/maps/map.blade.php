@extends('adminlte::page')

@section('title', 'DIG_Trip_Tracker')

@section('content_header')
@stop

@section('content')
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Map</h3>
            </div>
              @include('layouts.messages')
              @include('layouts.errors')
            <!-- /.box-header -->
            <div class="box-body">

                <div style="width: 1000px; height: 800px;">
                  {!! Mapper::render() !!}
                </div>

            </div>
        <!-- /.box-body -->
      </div>
@stop
