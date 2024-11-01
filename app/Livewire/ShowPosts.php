<?php

namespace App\Livewire;

use App\Models\Recent;
use App\Services\GeoLocationOpenWeatherService;
use App\Services\PhotoUnsplashService;
use App\Services\WeatherOpenWeatherService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{
    public string $city = '';

    public bool $errorLoading = false;

    public float $lat = -0.1276474;

    public float $lon = 51.5073219;

    public int $currentSlide = 0;

    public int $totalSlides = 10;

    public string $mapKey = '';

    public array $weather = [
        'weather' => [
            [
                'description' => 'n.v.t',
                'icon' => 'n.v.t',
            ],
        ],
        'main' => [
            'temp' => 'nvt',
            'humidity' => 'nvt',
        ],
        'wind' => [
            'speed' => 'nvt',
        ],
    ];

    public array $images = [
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
        'nvt',
    ];

    public function mount()
    {
        $this->mapKey = config('services.map.apikey');
    }

    public function find()
    {

        $user = Auth::user();
        if ($user !== null) {
            $recent = Recent::create([
                'user_id' => $user->id,
                'city' => $this->city,
            ]);
        }

        $geo = $this->getGeoLocation($this->city)[0];
        if (empty($geo)) {
            $this->errorLoading = true;

            return;
        }
        $this->errorLoading = false;

        $this->lat = $geo['lat'];
        $this->lon = $geo['lon'];

        $this->getWeatherReport();
        $this->getImages($this->city);

    }

    public function nextSlide()
    {
        $this->currentSlide = ($this->currentSlide + 1) % $this->totalSlides;
    }

    public function previousSlide()
    {
        $this->currentSlide = ($this->currentSlide - 1 + $this->totalSlides) % $this->totalSlides;
    }

    private function getImages(string $city)
    {
        $photoService = app(PhotoUnsplashService::class);

        $images = $photoService->getPhotosByName($city);

        $this->images = [];
        foreach ($images['results'] as $image) {
            $this->images[] = $image['urls']['regular'];
        }
    }

    private function getGeoLocation(string $city)
    {
        return app(GeoLocationOpenWeatherService::class)->getGeoLocationByCityName($city);
    }

    private function getWeatherReport()
    {
        $weatherService = app(WeatherOpenWeatherService::class);

        $this->weather = $weatherService->getWeatherBasedOnCordinates($this->lat, $this->lon);
    }

    public function render()
    {
        return view('components.explore');
    }
}
