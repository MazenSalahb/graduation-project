<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Notifications\NewBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('availability', 'sale')->with('user')->with('category')->withAvg('reviews', 'rating')->latest()->get();
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
        if ($book) {
            $users = User::where('id', '!=', $user_id)->get();
            Notification::send($users, new NewBook($book->id, auth()->user()->name, $book->title, auth()->user()->profile_picture));
        }
        return response()->json(["status" => "success", "message" => "Book created successfully", "data" => $book], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::with('user')->with('category')->find($id);
        return response()->json($book);
    }

    public function swap()
    {
        $swapBooks = Book::where('availability', 'swap')->with('user')->with('category')->withAvg('reviews', 'rating')->latest()->take(10)->get();
        return response()->json($swapBooks);
    }

    public function userBooks(string $id)
    {
        $books = Book::where('user_id', $id)->with('category')->with('user')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }

    public function categoryBooks(string $id)
    {
        $books = Book::where('category_id', $id)->with('category')->with('user')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'nullable|numeric|min:0'
        ]);

        $book = Book::find($id)->update($request->all());
        return response()->json(["status" => "success", "message" => "Book updated successfully", "data" => $book], 200);
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

    //* Admin routes

    // books routes
    public function pendingBooks()
    {
        $books = Book::where('approval_status', 'pending')->with('user')->with('category')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }
    public function approvalBooks()
    {
        $books = Book::where('approval_status', 'approved')->with('user')->with('category')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }
    public function approveBooks(string $id)
    {
        $book = Book::find($id);
        $book->approval_status = 'approved';
        $book->save();
        return response()->json(["status" => "success", "message" => "Book approved successfully"], 200);
    }
    public function rejectedBooks()
    {
        $books = Book::where('approval_status', 'rejected')->with('user')->with('category')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }

    public function rejectBooks(string $id)
    {
        $book = Book::find($id);
        $book->approval_status = 'rejected';
        $book->save();
        return response()->json(["status" => "success", "message" => "Book rejected successfully"], 200);
    }

    // search route
    public function search(Request $request)
    {
        // dd($request->search);
        try {
            $request->validate([
                'search' => 'required'
            ]);

            $query = $request->search;

            $books = Book::where(function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%')
                    ->orWhere('author', 'like', '%' . $query . '%')
                    ->orWhere('description', 'like', '%' . $query . '%');
            })
                ->with('user')
                ->with('category')
                ->withAvg('reviews', 'rating')
                ->latest()
                ->get();

            if ($books->isEmpty()) {
                return response()->json([
                    "status" => "info", // Use "info" for not found cases
                    "message" => "No books found matching your query."
                ], 200);
            }

            return response()->json($books);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }
}
