<?php

namespace App\Services;

class GeoLocationOpenWeatherService extends OpenWeatherBaseService
{
    public function getGeoLocationByCityName(string $name, int $limit)
    {
        return $this->request('/geo/1.0/direct', ['q' => $name, 'limit'=> $limit]);

    }


}