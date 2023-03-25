<?php

namespace App\Http\Controllers;

use App\Models\Place;
use GuzzleHttp\Client;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = $request->get('search');


        $places = Place::where('name', 'LIKE', "%$query%")
                ->orWhere('location', 'LIKE', "%$query%")
                ->get();

        if ($places->isEmpty()) {
            $errorMessage = 'No results found for your search query.';
            return view('show', compact('errorMessage', 'categories', 'query'));
        }

        // Loop through each place and add a review_count property
        foreach ($places as $place) {
            $place->review_count = $place->reviews()->count();
            $place->average_rating = $place->reviews()->avg('rating');
        }

        // Sort places by highest average rating
        $places = $places->sortByDesc('average_rating');

        return view('show', compact('places', 'categories', 'query'));
    }


    public function autocomplete(Request $request)
    {
        $query = $request->get('q');

        $places = Place::where('name', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->get();

        // Return a JSON response with the list of places
        return response()->json($places);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
    }
    public function searchResults($query)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
