<?php

namespace App\Services;

abstract class OpenWeatherBaseService extends BaseRequestService
{

    protected array $params;

    protected function request(string $method, string $end, array $params)
    {

        $this->params = $params;

    }

    protected function injectAppKey ()
    {
        $this->params['appid'] = config('services.openweather.apikey');
    }

}
