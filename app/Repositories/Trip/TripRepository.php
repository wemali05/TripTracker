<?php

namespace App\Repositories\Trip;

use App\Models\Trip;

interface TripRepository
{
    /**
     * Get all trip.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all trip into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find trip by id.
     *
     * @param $id Trip Id
     * @return Trip|null
     */
    public function find($id);

    /**
     * Find trip by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new trip.
     *
     * @param array $data
     * @return Trip
     */
    public function create(array $data);

    /**
     * Update specified trip.
     *
     * @param $id Trip Id
     * @param array $data
     * @return Trip
     */
    public function update($id, array $data);

    /**
     * Remove trip from repository.
     *
     * @param $id Trip Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function createTripByGpx($gpx, $name);
    
    public function saveGpxFile($gpx);

    public function downloadGpxFile($gpxFileNamePath);

    public function makeGoogleMapBySegment($segment_id);

}
