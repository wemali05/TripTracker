<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('vendor.adminlte.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//TRIP
Route::get('/trip/index', 'TripController@index')->name('trip.index');
Route::get('/trip/create', 'TripController@create')->name('trip.create');
Route::post('/trip/store', 'TripController@store')->name('trip.store');
Route::get('/trip/gpx/download/{name}', 'TripController@downloadGpx')->name('gpx.download');
Route::get('/trip/delete/{id}', 'TripController@destroy')->name('trip.delete');
Route::get('/trip/edit/{id}', 'TripController@edit')->name('trip.edit');
Route::post('/trip/update/{id}', 'TripController@update')->name('trip.update');


//TRIP TRACK
Route::get('/track/select/{trip_id}', 'TripTrackController@selectTracksByTrip')->name('track.select');


//TRACK SEGMENT
Route::get('/segment/select/{track_id}', 'TrackSegmentController@selectSegmentsByTrack')->name('segment.select');


//SEGMENT POINT
Route::get('/point/select/{track_segment_id}', 'SegmentPointController@selectPointsBySegment')->name('point.select');

//MAP
Route::get('/map/show/{segment_id}', 'MapController@renderTripViaGoogleMaps')->name('map.show');
