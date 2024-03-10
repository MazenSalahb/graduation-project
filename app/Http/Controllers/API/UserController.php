<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                "name" => "required|string",
                "email" => "required|email|unique:users",
                'location' => 'required|string',
                'profile_picture' => 'nullable',
                "password" => "required|string|min:6",
            ]);

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "location" => $request->location,
                'profile_picture' => $request->profile_picture ?? 'https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg',
                "password" => bcrypt($request->password),
            ]);

            return response()->json([
                "status" => "success",
                "message" => "User created successfully",
                "data" => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid credentials",
            ], 401);
        }
        // $token = $user->createToken("auth_token", ['expires_at' => now()->addDays(7)])->plainTextToken;
        $token = $user->createToken("auth_token")->plainTextToken;

        return response()->json([
            "status" => "success",
            "token" => $token,
            "data" => $user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
