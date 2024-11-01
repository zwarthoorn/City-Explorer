<?php

namespace App\Services;

abstract class OpenWeatherBaseService extends BaseRequestService
{
    protected array $params;

    protected string $base = 'https://api.openweathermap.org';

    // i suspect this wil only be get requests
    protected function request(string $end, array $params)
    {
        $this->params = $params;

        $this->injectAppKey();

        //        dd($this->params);
        return $this->makeRequest('get', $this->base.$end, [], $this->params);

    }

    protected function injectAppKey()
    {
        $this->params['appid'] = config('services.openweather.apikey');
    }
}
