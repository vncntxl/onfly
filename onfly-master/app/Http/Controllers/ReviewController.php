<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Request $request, $place_id)
    {
        // validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        // create a new review instance and set the user_id and user_name
        $review = new Review([
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
            'place_id' => $place_id,
            'user_id' => $request->input('user_id'),
            'user_name' => $request->input('user_name'),
        ]);

        // save the review to the database
        $review->save();

        // redirect back to the details page for the place
        return redirect()->route('details', ['name' => $review->place->name]);
    }
}
