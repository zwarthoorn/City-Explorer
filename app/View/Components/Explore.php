<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class Explore extends Component
{

    public string $city = '';
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }


    public function like()
    {
        Log::info($this->city);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.explore');
    }
}
