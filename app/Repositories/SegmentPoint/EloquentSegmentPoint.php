<?php

namespace App\Repositories\SegmentPoint;

use App\Models\SegmentPoint;
use DB;

class EloquentSegmentPoint implements SegmentPointRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return SegmentPoint::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return SegmentPoint::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $segmentPoint = SegmentPoint::create($data);

        return $segmentPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $segmentPoint = $this->find($id);

        $segmentPoint->update($data);

        return $segmentPoint;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $segmentPoint = $this->find($id);

        return $segmentPoint->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return SegmentPoint::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return SegmentPoint::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $segmentPoint = SegmentPoint::where($where);
        
        return $segmentPoint;
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
