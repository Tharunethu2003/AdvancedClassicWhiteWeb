<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Routing\Controller;


// Ensure this controller extends the base Controller class
class ReviewController extends Controller
{
    // Constructor to enforce authentication
    public function __construct()
    {
        $this->middleware('auth');  // Correct syntax to apply middleware
    }

    public function index()
    {
        // Get all reviews with the user who wrote them
        $reviews = Review::with('user')->get();

        return view('reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Save the review
        Review::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name') ?: auth()->user()->name, // Default to auth user name if no custom name

            'content' => $request->content,
            'rating' => $request->rating,
        ]);

        return redirect()->route('reviews.index');
    }
}
