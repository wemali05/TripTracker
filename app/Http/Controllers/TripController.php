<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TripTrack\TripTrackRepository;
use App\Repositories\TrackSegment\TrackSegmentRepository;
use App\Repositories\SegmentPoint\SegmentPointRepository;
use App\Repositories\Trip\TripRepository;
use App\Repositories\User\UserRepository;
use Response;
use Auth;

class TripController extends Controller
{
    //
    /**
     * @var EloquentTripTrack
     * @var EloquentTrip
     * @var EloquentTrackSegment
     * @var EloquentSegmentPoint
     * @var EloquentUser
     */
    private $tripTrack;
    private $trip;
    private $trackSegment;
    private $segmentPoint;
    private $user;

    /**
     * Main constructor.
     * @param TripTrackRepository $tripTrack
     * @param TripRepository $trip
     * @param TrackSegmentRepository $trackSegment
     * @param SegmentPointRepository $segmentPoint
     * @param UserRepository $user
     */
    public function __construct(TripTrackRepository $tripTrack, TripRepository $trip, UserRepository $user, TrackSegmentRepository $trackSegment, SegmentPointRepository $segmentPoint)
    {
        $this->tripTrack = $tripTrack;
        $this->trip = $trip;
        $this->trackSegment = $trackSegment;
        $this->segmentPoint = $segmentPoint;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trips = $this->trip->where(['user_id' => Auth::user()->id])->paginate(15);

        return view('vendor.adminlte.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendor.adminlte.trips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'gpx' => 'required'
        ]);

        if(request()->gpx->getClientOriginalExtension() != 'gpx') return redirect()->back()->withErrors(['File type must be .GPX']);

        $this->trip->createTripByGpx($request->gpx, $request->name);

        return redirect()->back()->with('success', 'Successfully added new trip.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $trip = $this->trip->find($id);

        return view('vendor.adminlte.trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => 'required'
        ]);

        $trip = $this->trip->find($id);

        $trip->update([
            'name' => $request->name,
        ]);

        return redirect()->route('trip.index')->with('success', 'Successfully updated trip '.$trip->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $trip = $this->trip->find($id);
        $name = $trip->name;
        $this->trip->delete($id);

        return redirect()->back()->with('success', 'Successfully deleted trip '.$name);
    }

    public function downloadGpx($gpxFileName)
    {
        return $this->trip->downloadGpxFile($gpxFileName);
    }

}
