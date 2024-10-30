<?php

namespace App\Http\Controllers;

use App\Models\Recent;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $recents = [];
        if ($user !== null) {
            $recents = Recent::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();
        }

        return view('welcome', ['recents' => $recents]);
    }
}
