<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Subscription;
use App\Models\User;
use App\Notifications\NewBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::where('approval_status', 'approved')
            ->where('availability', 'sale')
            ->with('user')
            ->with('category')
            ->withAvg('reviews', 'rating')
            ->with('subscription')
            ->orderBy('featured', 'desc')
            ->get(); // Get only book columns to avoid column conflicts

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
        $swapBooks = Book::where('approval_status', 'approved')
            ->where('availability', 'swap')  // Filter by availability first
            ->with('user')
            ->with('category')
            ->withAvg('reviews', 'rating')
            ->with('subscription')
            ->orderBy('featured', 'desc')
            ->get();

        return response()->json($swapBooks);
    }


    public function userBooks(string $id)
    {
        $books = Book::where('user_id', $id)->with('category')->with('subscription')->with('user')->withAvg('reviews', 'rating')->latest()->get();
        return response()->json($books);
    }

    public function categoryBooks(string $id)
    {
        $books = Book::where('category_id', $id)
            ->where('approval_status', 'approved')
            ->where('availability', '!=', 'sold')
            ->with('category')
            ->with('user')
            ->with('subscription')
            ->withAvg('reviews', 'rating')
            ->get();
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
        $book->delete();
        return response()->json(["status" => "success", "message" => "Book deleted successfully"], 200);
    }

    //* Admin routes

    public function countBooks()
    {
        $books = Book::count();
        return response()->json($books);
    }

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

    // sold route
    public function sold(string $id)
    {
        $book = Book::find($id);
        $book->availability = 'sold';
        $book->save();
        return response()->json(["status" => "success", "message" => "Book marked as sold successfully"], 200);
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

    // subscription
    public function makeSubscription(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'price' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);


        $subscription = Subscription::create([
            'book_id' => $request->book_id,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => $request->user_id
        ]);

        $book = Book::find($request->book_id);
        $book->featured = $request->end_date;
        $book->save();

        return response()->json(["status" => "success", "message" => "Subscription created successfully", "data" => $subscription], 201);
    }

    public function allSubscriptions()
    {
        $subscriptions = Subscription::with('book')->with('user')->latest()->get();
        return response()->json($subscriptions);
    }

    public function cancelSubscription(string $id, Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);
        $subscription = Subscription::find($id);
        if ($subscription) {
            $subscription->status = 'cancelled';
            $subscription->save();
            $book = Book::find($request->book_id);
            $book->featured = null;
            $book->save();
        } else {
            return response()->json(["status" => "error", "message" => "Subscription not found"], 404);
        }
        return response()->json(["status" => "success", "message" => "Subscription deactivated successfully"], 200);
    }
}
