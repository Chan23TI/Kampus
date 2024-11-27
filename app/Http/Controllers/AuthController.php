<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Find the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Generate a token for the user
            $token = $user->createToken('BeritaAppToken')->plainTextToken;

            // Return the token with a success message
            return response()->json([
                'token' => $token,
                'message' => 'Login successful'
            ]);
        }

        // If credentials are invalid, return an error message
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}

