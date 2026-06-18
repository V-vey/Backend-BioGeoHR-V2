<?php

namespace App\Service;

class GeoFenceService
{
    function calculateDistance($lat1, $long1, $lat2, $long2)
    {
        // latitude and longitude 1 is the center of the geofence
        // latitude and longitude 2 is the location of the employee

        $piValue = M_PI; // pi valuee
        $earthRadiusM = 6371000; // in meters
        $earthRadiusKm = $earthRadius / 1000; // in Km

        $radiansLat1 =  $lat1 * ($piValue / 180);
        $radiansLat2 =  $lat2 * ($piValue / 180);
        $radiansLong1 = $long1 * ($piValue / 180);
        $radiansLong2 = $long2 * ($piValue / 180);

        $latDiff = $radiansLat2 - $radiansLat1;
        $longDiff = $radiansLong2 - $radiansLong1;

        $divLat = $latDiff / 2;
        $divLong = $longDiff / 2;

        $sin2lat = sin($divLat) *  sin($divLat);
        $sin2long = sin($divLong) * sin($divLong);

        $coslat1 = cos($radiansLat1);
        $coslat2 = cos($radiansLat2);

        $formula = $sin2lat + ($coslat1 * $coslat2 * $sin2long);
        $sqrtFormula = sqrt($formula);
        $arcsin = asin($sqrtFormula);

        $twoR = 2 * $earthRadiusKm; // change if its km or meter

        $finalFormula = $twoR * $arcsin;

        return($finalFormula);
    }
}