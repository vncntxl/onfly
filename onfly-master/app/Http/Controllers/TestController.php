<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $response = Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json', [
            'query' => [
                'key' => 'AIzaSyAj2VnrtswT3N06pInCHVwtH27IHs6jrCo',
                'query' => $query,
            ]
        ]);

        $places = $response->json()['results'];

        return view('test', compact('places', 'query'));
    }
}
