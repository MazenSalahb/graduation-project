<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chats = Chat::with('book', 'buyer', 'seller')->get();
        return response()->json($chats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'seller_id' => 'required|integer',
            'book_id' => 'required|integer'
        ]);
        $user_id = auth()->user()->id; // Get the user_id from the authenticated user
        $chat = Chat::create(array_merge([
            'seller_id' => $user_id,
            'book_id' => $request->book_id,
        ], ['buyer_id' => $user_id]));
        return response()->json($chat, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chat = Chat::find($id)->with('book', 'buyer', 'seller')->first();
        return response()->json($chat);
    }

    public function userChats(string $id)
    {
        $chats = Chat::where('buyer_id', $id)
            ->orWhere('seller_id', $id)
            ->has('messages') // Only return chats with messages
            ->with('book', 'buyer', 'seller')
            ->get();
        return response()->json($chats);
    }

    public function userBuyingChats(string $id)
    {
        $chats = Chat::where('buyer_id', $id)
            ->where('buyer_id', $id)
            ->where('seller_id', '!=', $id)
            ->has('messages') // Only return chats with messages
            ->with('book', 'buyer', 'seller')
            ->get();
        return response()->json($chats);
    }
    public function userSellingChats(string $id)
    {
        $chats = Chat::where('seller_id', $id)
            ->where('seller_id', $id)
            ->where('buyer_id', '!=', $id)
            ->has('messages') // Only return chats with messages
            ->with('book', 'buyer', 'seller')
            ->get();
        return response()->json($chats);
    }
    public function bookChats(string $id)
    {
        $chats = Chat::where('book_id', $id)->with('book', 'buyer', 'seller')->get();
        return response()->json($chats);
    }
    public function checkChatExistence(string $seller, string $buyer, string $bookid)
    {
        $chat = Chat::where([
            'seller_id' => $seller,
            'buyer_id' => $buyer,
            'book_id' => $bookid,
        ])->with('book', 'buyer', 'seller')->first();

        if (!$chat) {
            Chat::create([
                'seller_id' => $seller,
                'buyer_id' => $buyer,
                'book_id' => $bookid,
            ]);
            $chat = Chat::where([
                'seller_id' => $seller,
                'buyer_id' => $buyer,
                'book_id' => $bookid,
            ])->with('book', 'buyer', 'seller')->first();
        }

        return response()->json($chat);
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
        $chat = Chat::find($id);
        $chat->delete();
        return response()->json(null, 204);
    }
}
