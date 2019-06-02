<?php

namespace App\Repositories\TripTrack;

use App\Models\TripTrack;
use DB;

class EloquentTripTrack implements TripTrackRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return TripTrack::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return TripTrack::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $tripTrack = TripTrack::create($data);

        return $tripTrack;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $tripTrack = $this->find($id);

        $tripTrack->update($data);

        return $tripTrack;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $tripTrack = $this->find($id);

        return $tripTrack->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return TripTrack::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return TripTrack::where('name', $name)->first();
    }

    /**
     * {@inheritdoc}
     */
    public function where($where)
    {
        $tripTrack = TripTrack::where($where);
        
        return $tripTrack;
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
