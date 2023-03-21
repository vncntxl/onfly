<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class PlaceController extends Controller
{
    public function showInputForm()
    {
        $categories = Category::all();
        $places = Place::all();
        return view('input', compact('categories', 'places'));
    }


    public function show()
    {
        $categories = Category::all();
        $places = Place::all();
        return view('input', compact('categories', 'places'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'place_picture' => 'nullable|image|max:2048',
            'reviews.*.review' => 'required|max:255',
            'reviews.*.comment' => 'nullable|max:255',
            'reviews.*.star' => 'required|integer|between:1,5',
        ]);

        // Create the new Place
        $place = new Place;
        $place->name = $validatedData['name'];
        $place->location = $validatedData['location'];
        $place->description = $validatedData['description'];
        $place->category_id = $validatedData['category_id'];
        $place->latitude = $validatedData['latitude'];
        $place->longitude = $validatedData['longitude'];

        if ($request->hasFile('place_picture')) {
            $path = $request->file('place_picture')->store('public/img');
            $place->place_picture = str_replace('public/', '', $path);
        }

        $place->save();

        // Add the Reviews to the Place
        // foreach ($validatedData['reviews'] as $reviewData) {
        //     $review = new Review;
        //     $review->review = $reviewData['review'];
        //     $review->comment = $reviewData['comment'];
        //     $review->star = $reviewData['star'];
        //     $review->place_id = $place->id;
        //     $review->save();
        // }

        Artisan::call('db:seed', ['--class' => 'PlaceSeeder']);

        // Return a success response
        return redirect()->route('input');
    }

public function destroy(Place $place)
{
    // Delete the reviews associated with the place
    $place->reviews()->delete();

    // Delete the place
    $place->delete();

    return redirect()->route('input');
}
public function autocomplete(Request $request)
{
    $searchTerm = $request->get('q');
    $places = Place::where('name', 'like', '%'.$searchTerm.'%')->orWhere('location', 'like', '%'.$searchTerm.'%')->get();
    $suggestions = $places->pluck('name');
    return response()->json($suggestions);
}

public function sort($place_name, $sort)
{
    $place = Place::where('name', $place_name)->firstOrFail();
    $reviews = $place->reviews()->orderBy('rating', $sort)->get();
    return view('details', compact('place', 'reviews', 'sort'));
}
public function filter(Request $request)
{
    $categories = Category::all();
    $category_id = $request->input('category_id');

    if (!empty($category_id)) {
        $category = Category::find($category_id);
        if ($category) {
            $places = $category->places;
        } else {
            $errorMessage = 'Category not found.';
            return view('show', compact('errorMessage', 'categories'));
        }
    } else {
        $places = Place::all();
    }

    return view('show', compact('places', 'categories'));
}

}
