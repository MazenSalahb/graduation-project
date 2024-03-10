<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::withAvg('reviews', 'rating')->get();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:new,used',
            'availability' => 'required|in:swap,sale',
            'image' => 'nullable',
        ]);

        $user_id = auth()->user()->id; // Get the user_id from the authenticated user

        $book = Book::create(array_merge($request->all(), ['user_id' => $user_id]));
        return response()->json(["status" => "success", "message" => "Book created successfully", "data" => $book]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return response()->json($book);
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
        //
    }
}
