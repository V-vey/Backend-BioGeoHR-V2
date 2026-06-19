<?php

namespace App\Http\Controllers\Feature;

use Illuminate\Http\Request;
use App\Service\GeoFenceService;
use App\Models\Location;
use App\Models\UserLocation;
use App\Models\Users;
use App\Models\Attendance;

class GeoFenceController
{
    protected $geofence;
    protected $userLatitude;
    protected $userLongitude;
    protected $locationLatitude;
    protected $locationLongitude;

    public function __construct(GeoFenceService $geofence)
    {
        $this->geofence = $geofence;

    }

    public function validationLocation(string $id){
        $attendance = Attendance::find($id);
        $location = Location::find($attendance->location_id);
        $userLocation = UserLocation::find($attendance->user_location_id);

        $haversineCal = $this->geofence->calculateDistance(
            $location->value('latitude'),
            $location->value('longitude'),
            $userLocation->value('latitude'),
            $userLocation->value('longitude'),
        );
        return response()-> json(['message' => $haversineCal], 201);
    }
}
