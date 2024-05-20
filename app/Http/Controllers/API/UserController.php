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
                "phone" => "required|unique:users",
                'location' => 'required|string',
                'profile_picture' => 'nullable',
                "password" => "required|string|min:6",
            ]);

            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "location" => $request->location,
                "phone" => $request->phone,
                'profile_picture' => $request->profile_picture ?? 'https://i.pinimg.com/474x/65/25/a0/6525a08f1df98a2e3a545fe2ace4be47.jpg',
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
        $user = User::findOrFail($id);
        try {
            $this->validate($request, [
                "name" => "required|string",
                "email" => "required|email|unique:users,email," . $id,
                "phone" => "required|unique:users,phone," . $id,
                // 'location' => 'required|string',
                'profile_picture' => 'nullable',
                "password" => "nullable|string|min:6",
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;

            if ($request->has('profile_picture') && $request->profile_picture != null) {
                $user->profile_picture = $request->profile_picture;
            }

            if ($request->has('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return response()->json([
                "status" => "success",
                "message" => "User updated successfully",
                "data" => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    public function changePassword(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        try {
            $this->validate($request, [
                "old_password" => "required|string",
                "new_password" => "required|string|min:6",
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Invalid old password",
                ], 401);
            }

            $user->password = bcrypt($request->new_password);
            $user->save();
            return response()->json([
                "status" => "success",
                "message" => "Password changed successfully",
                "data" => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        try {
            $this->validate($request, [
                "password" => "required|string",
            ]);

            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    "status" => "error",
                    "message" => "Invalid password",
                ], 401);
            }

            $user->delete();
            return response()->json([
                "status" => "success",
                "message" => "User deleted successfully",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage(),
            ], 500);
        }
    }
}
