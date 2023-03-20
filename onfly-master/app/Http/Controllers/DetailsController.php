<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function index($name)
    {
        $place = Place::where('name', $name)->firstOrFail();

        return view('details', compact('place'));
    }
}
