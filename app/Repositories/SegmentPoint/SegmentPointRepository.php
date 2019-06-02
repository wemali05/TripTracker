<?php

namespace App\Repositories\SegmentPoint;

use App\Models\SegmentPoint;

interface SegmentPointRepository
{
    /**
     * Get all segment point.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all segment points into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Find segment point by id.
     *
     * @param $id Segment Point Id
     * @return SegmentPoint|null
     */
    public function find($id);

    /**
     * Find segment points by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new segment point.
     *
     * @param array $data
     * @return SegmentPoint
     */
    public function create(array $data);

    /**
     * Update specified segment point.
     *
     * @param $id Segment Point Id
     * @param array $data
     * @return SegmentPoint
     */
    public function update($id, array $data);

    /**
     * Remove segment point from repository.
     *
     * @param $id Segment Point Id
     * @return bool
     */
    public function delete($id);

    public function where($where);

    public function with($with);


}
