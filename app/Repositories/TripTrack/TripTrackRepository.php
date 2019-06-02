<?php

namespace App\Repositories\TripTrack;

use App\Models\TripTrack;

interface TripTrackRepository
{
    /**
     * Get all trip tracks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all trip tracks into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find trip track by id.
     *
     * @param $id Trip Track Id
     * @return TripTrack|null
     */
    public function find($id);

    /**
     * Find trip track by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new trip.
     *
     * @param array $data
     * @return TripTrack
     */
    public function create(array $data);

    /**
     * Update specified trip track.
     *
     * @param $id Trip Track Id
     * @param array $data
     * @return TripTrack
     */
    public function update($id, array $data);

    /**
     * Remove trip track from repository.
     *
     * @param $id Trip Track Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function with($with);


}
