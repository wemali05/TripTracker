<?php

namespace App\Repositories\TrackSegment;

use App\Models\TrackSegment;

interface TrackSegmentRepository
{
    /**
     * Get all track segments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all track segments into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find track segment by id.
     *
     * @param $id Track Segment Id
     * @return TrackSegment|null
     */
    public function find($id);

    /**
     * Find track segments by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new track segment.
     *
     * @param array $data
     * @return TrackSegment
     */
    public function create(array $data);

    /**
     * Update specified track segment.
     *
     * @param $id Track Segment Id
     * @param array $data
     * @return TrackSegment
     */
    public function update($id, array $data);

    /**
     * Remove track segments from repository.
     *
     * @param $id Track Segment Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function with($with);


}
