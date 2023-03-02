<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $apiKey = env('GOOGLE_MAPS_API_KEY');

        $response = Http::get("https://maps.googleapis.com/maps/api/place/findplacefromtext/json?input={$query}&inputtype=textquery&fields=name,geometry,photos,formatted_address&key={$apiKey}");

        $results = $response['candidates'] ?? [];

        return view('test', compact('results'));
    }
}
