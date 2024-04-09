<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy("created_at", "desc")->get();
        return response()->json($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "book_id" => "required|integer",
            "rating" => "required|between:1,5",
            "review_text" => "nullable|string"
        ]);
        $review = Review::create(array_merge($request->all(), ["user_id" => auth()->user()->id]));
        return response()->json($review, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::with('user')->find($id);
        return response()->json($review);
    }

    public function userReviews(string $id)
    {
        $reviews = Review::where("user_id", $id)->with('user')->orderBy("created_at", "desc")->get();
        return response()->json($reviews);
    }

    public function bookReviews(string $id)
    {
        $reviews = Review::where("book_id", $id)->with('user')->orderBy("created_at", "desc")->get();
        return response()->json($reviews);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }
        $review->delete();
        return response()->json(['message' => 'Review deleted successfully'], 200);
    }
}
