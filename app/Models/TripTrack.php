<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TripTrack extends Model
{
    //
    protected $fillable = ['trip_id'];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function trackSegments()
    {
        return $this->hasMany(TrackSegment::class);
    }
}
