<?php

namespace App\Http\Controllers;

use App\Models\BookMark;
use Illuminate\Http\Request;

class BookMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookMarks = BookMark::with('book', 'user')->get();
        return response()->json($bookMarks);
    }

    public function userBookMarks($id)
    {
        $bookMarks = BookMark::with('book.category', 'book.reviews', 'book.user')->where('user_id', $id)->get();
        return response()->json($bookMarks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);
        $bookMark = BookMark::create($request->all());
        return response()->json($bookMark);
    }

    /**
     * Display the specified resource.
     */
    public function show(BookMark $bookMark)
    {
        return response()->json($bookMark);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookMark $bookMark)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);
        $bookMark->update($request->all());
        return response()->json($bookMark);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bookMark = BookMark::find($id);
        $bookMark->delete();
        return response()->json(["status" => "success", "message" => "BookMark deleted successfully"]);
    }
}
