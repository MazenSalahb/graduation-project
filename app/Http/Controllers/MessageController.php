<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
        return response()->json($messages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'chat_id' => 'required|integer',
        ]);
        $user_id = auth()->user()->id; // Get the user_id from the authenticated user
        $message = Message::create(array_merge([
            'content' => $request->content,
            'chat_id' => $request->chat_id,
        ], ['sender_id' => $user_id]));
        return response()->json($message, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::find($id);
        return response()->json($message);
    }

    public function chatMessages(string $id)
    {
        $messages = Message::where('chat_id', $id)->with('sender')->latest()->get();
        return response()->json($messages);
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
        $message = Message::find($id);
        $message->delete();
        return response()->json($message, 204);
    }
}
