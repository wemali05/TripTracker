<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TripTrack\TripTrackRepository;
use App\Repositories\TrackSegment\TrackSegmentRepository;
use App\Repositories\SegmentPoint\SegmentPointRepository;
use App\Repositories\Trip\TripRepository;
use App\Repositories\User\UserRepository;

class SegmentPointController extends Controller
{
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

    public function selectPointsBySegment($track_segment_id)
    {
        $segmentPoints = $this->segmentPoint->where(['track_segment_id' => $track_segment_id])->with('trackSegment')->paginate(30);

        return view('vendor.adminlte.segmentPoints.index', compact('segmentPoints'));
    }

}
