<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('availability', 'sale')->with('category')->withAvg('reviews', 'rating')->latest()->get();
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
            'image' => 'required',
            'price' => 'nullable|numeric|min:0'
        ]);

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imageName = time() . '.' . $image->getClientOriginalExtension();
        //     $imagePath = public_path('/images');
        //     $image->move($imagePath, $imageName);
        //     $imagePath = "/images/" . $imageName;
        // }

        $user_id = auth()->user()->id; // Get the user_id from the authenticated user

        $book = Book::create(array_merge([
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'availability' => $request->availability,
            'price' => $request->price,
            'image' => $request->image,
        ], ['user_id' => $user_id]));
        return response()->json(["status" => "success", "message" => "Book created successfully", "data" => $book], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function swap()
    {
        $swapBooks = Book::where('availability', 'swap')->withAvg('reviews', 'rating')->latest()->take(10)->get();
        return response()->json($swapBooks);
    }

    public function userBooks(string $id)
    {
        $books = Book::where('user_id', $id)->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
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
        $book = Book::find($id);
        if ($book->image) {
            $image_path = public_path() . parse_url($book->image, PHP_URL_PATH);  // Value will be something like /images/1710244736.png
            // dd($image_path);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }

        $book->delete();
        return response()->json(["status" => "success", "message" => "Book deleted successfully"], 200);
    }
}
