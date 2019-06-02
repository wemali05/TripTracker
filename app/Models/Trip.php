<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Trip extends Model
{
    //
    protected $fillable = ['name', 'user_id', 'url', 'gpx_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tripTracks()
    {
        return $this->hasMany(TripTrack::class);
    }



}
