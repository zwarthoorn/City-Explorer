<?php

namespace App\Services;

class PhotoUnsplashService extends UnsplashBaseService
{
    public function getPhotosByName(string $name, int $limit = 10)
    {

        return $this->request('/search/photos', ['query' => $name, 'per_page' => $limit]);

    }
}
