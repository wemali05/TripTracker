<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TripTrack\TripTrackRepository;
use App\Repositories\TrackSegment\TrackSegmentRepository;
use App\Repositories\SegmentPoint\SegmentPointRepository;
use App\Repositories\Trip\TripRepository;
use App\Repositories\User\UserRepository;
use Mapper;

class MapController extends Controller
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

    public function renderTripViaGoogleMaps($segment_id)
    {
        $this->trip->makeGoogleMapBySegment($segment_id);

        return view('vendor.adminlte.maps.map');
    }



}
