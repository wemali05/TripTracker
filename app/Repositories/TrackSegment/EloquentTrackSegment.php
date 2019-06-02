<?php

namespace App\Repositories\TrackSegment;

use App\Models\TrackSegment;
use DB;

class EloquentTrackSegment implements TrackSegmentRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return TrackSegment::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return TrackSegment::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $trackSegment = TrackSegment::create($data);

        return $trackSegment;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $trackSegment = $this->find($id);

        $trackSegment->update($data);

        return $trackSegment;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $trackSegment = $this->find($id);

        return $trackSegment->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return trackSegment::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return trackSegment::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $trackSegment = trackSegment::where($where);
        
        return $trackSegment;
    }
    
    /**
     * {@inheritdoc}
     */
    public function with($with)
    {
        $tripTrack = TripTrack::with($with);
        
        return $tripTrack;
    }


}
