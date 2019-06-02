<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\Trip\TripRepository;
use App\Repositories\Trip\EloquentTrip;
use App\Repositories\TripTrack\TripTrackRepository;
use App\Repositories\TripTrack\EloquentTripTrack;
use App\Repositories\TrackSegment\TrackSegmentRepository;
use App\Repositories\TrackSegment\EloquentTrackSegment;
use App\Repositories\SegmentPoint\SegmentPointRepository;
use App\Repositories\SegmentPoint\EloquentSegmentPoint;
use App\Repositories\User\UserRepository;
use App\Repositories\User\EloquentUser;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(TripRepository::class, EloquentTrip::class);
        $this->app->singleton(TripTrackRepository::class, EloquentTripTrack::class);
        $this->app->singleton(TrackSegmentRepository::class, EloquentTrackSegment::class);
        $this->app->singleton(SegmentPointRepository::class, EloquentSegmentPoint::class);
        $this->app->singleton(UserRepository::class, EloquentUser::class);
    }
}
