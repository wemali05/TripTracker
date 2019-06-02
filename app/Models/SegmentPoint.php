<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentPoint extends Model
{
    //
    protected $fillable = ['latitude', 'longitude', 'elevation', 'time', 'track_segment_id'];

    public function trackSegment()
    {
        return $this->belongsTo(TrackSegment::class);
    }

}
