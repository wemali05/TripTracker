<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackSegment extends Model
{
    //
    protected $fillable = ['trip_track_id'];

    public function tripTrack()
    {
        return $this->belongsTo(TripTrack::class);
    }

    public function segmentPoints()
    {
        return $this->hasMany(SegmentPoint::class);
    }
}
