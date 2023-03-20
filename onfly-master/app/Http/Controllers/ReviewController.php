<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;
use App\Models\Review;

class ReviewController extends Controller
{
    public function addReview(Request $request, $place_id)
    {
        // validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // create a new review instance
        $review = new Review([
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            'place_id' => $place_id,
        ]);

        // save the review to the database
        $review->save();

        // redirect back to the details page for the place
        return redirect()->route('details', ['name' => $review->place->name]);
    }
}
