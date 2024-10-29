<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class BaseRequestService
{

    protected function makeRequest(string $method, string $endpoint, array $data = [], array $params = [])
    {
        $response = Http::$method($this->baseUrl.$endpoint, $method === 'get' ? $params : $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Request failed: '.$response->body());
    }

}
