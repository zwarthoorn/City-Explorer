<?php

namespace App\Services;

class WeatherOpenWeatherService extends OpenWeatherBaseService
{
    public function getWeatherBasedOnName(string $city)
    {

        $geoService = app(GeoLocationOpenWeatherService::class);
        $location = $geoService->getGeoLocationByCityName($city);

        return $this->request('/data/2.5/weather', ['lat' => $location[0]['lat'], 'lon' => $location[0]['long'], 'units' => 'metric']);

    }

    public function getWeatherBasedOnCordinates(float $lat, float $long)
    {
        return $this->request('/data/2.5/weather', ['lat' => $lat, 'lon' => $long, 'units' => 'metric']);

    }
}
