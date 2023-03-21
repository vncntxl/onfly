<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    public function index($name)
    {
        $place = Place::where('name', $name)->firstOrFail();
        $reviews = $place->reviews()->latest()->get();
        $sort = 'asc';

        return view('details', compact('place', 'reviews', 'sort'));
    }

    public function addReview(Request $request, Place $place)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable',
        ]);

        $review = new Review([
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        $place->reviews()->save($review);

        return redirect()->back();
    }
}
