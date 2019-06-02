<?php

namespace App\Repositories\Trip;

use App\Models\Trip;
use phpGPX\phpGPX;
use DB;
use Auth;
use Response;
use App\Repositories\TripTrack\TripTrackRepository;
use App\Repositories\TrackSegment\TrackSegmentRepository;
use App\Repositories\SegmentPoint\SegmentPointRepository;
use App\Repositories\User\UserRepository;
use Mapper;


class EloquentTrip implements TripRepository
{

    /**
     * @var TripTrackRepository
     * @var UserRepository
     * @var TrackSegmentRepository
     * @var SegmentPointRepository

     */
    private $tripTrack;
    private $trackSegment;
    private $segmentPoint;
    private $user;

    public function __construct(TripTrackRepository $tripTrack, TrackSegmentRepository $trackSegment, SegmentPointRepository $segmentPoint, UserRepository $user)
    {
        $this->tripTrack    = $tripTrack;
        $this->trackSegment = $trackSegment;
        $this->segmentPoint = $segmentPoint;
        $this->user = $user;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Trip::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Trip::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $trip = Trip::create($data);

        return $trip;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $trip = $this->find($id);

        $trip->update($data);

        return $trip;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $trip = $this->find($id);

        return $trip->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Trip::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Trip::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $trip = Trip::where($where);
        
        return $trip;
    }

    public function createTripByGpx($gpx, $name)
    {
        $phpGpx = new phpGPX();

        $file = $phpGpx->load($gpx);

        //Save .GPX file
        $gpxUrl = $this->saveGpxFile($gpx);
        $gpxName = basename($gpxUrl, ".gpx");

        //New Trip
        $trip = Trip::create([
            'name' => $name,
            'url' => $gpxUrl,
            'gpx_name' => $gpxName,
            'user_id' => Auth::user()->id,
        ]);
        $user = $this->user->find(Auth::user()->id);
        $trip->user()->associate($user);
        $trip->save();

        foreach ($file->tracks as $track)
        {
            //New Trip Track
            $tripTrack = $this->tripTrack->create([
                'trip_id' => $trip->id,
            ]);
            $tripTrack->trip()->associate($trip);
            $tripTrack->save();

            foreach ($track->segments as $segment)
            {
                //New Track Segment
                $trackSegment = $this->trackSegment->create([
                    'trip_track_id' => $tripTrack->id
                ]);
                $trackSegment->tripTrack()->associate($tripTrack);
                $trackSegment->save();

                foreach($segment->points as $point)
                {
                    //New Segment Point
                    $segmentPoint = $this->segmentPoint->create([
                        'track_segment_id' => $trackSegment->id,
                        'latitude' => $point->latitude,
                        'longitude' => $point->longitude,
                        'elevation' => $point->elevation,
                        'time' => $point->time
                    ]);
                    $segmentPoint->trackSegment()->associate($trackSegment);
                    $segmentPoint->save();
                }

            }
        }
    }

    public function saveGpxFile($gpx)
    {
        $file = $gpx;
        $name = time().$file->getClientOriginalName();
        $file->move('user/gpx',$name);
        $gpxUrl = '/user/gpx/'.$name;

        return $gpxUrl;
    }

    public function downloadGpxFile($name)
    {
        $file = public_path()."/user/gpx/".$name.".gpx";
        $headers = array('Content-Type: application/gpx',);
        return Response::download($file, $name.".gpx", $headers);
    }

    public function makeGoogleMapBySegment($segment_id)
    {
        $points = $this->segmentPoint->where(['track_segment_id' => $segment_id])->get();

        Mapper::map($points->first()->latitude, $points->first()->longitude,  ['zoom' => 11.5]);

        foreach($points as $point)
        {
            Mapper::marker($point->latitude, $point->longitude);
        }
    }

}
