<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function show()
    {
        $places = Place::inRandomOrder()->limit(3)->get();
        return view('landingpage', compact('places'));
    }
}
