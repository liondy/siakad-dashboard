<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['Incorrect Email']
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Incorrect Password']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json(
            [
                'jwt-token' => $token,
                'user' => new UserResource($user),
            ]
        );
    }

    public function logout (Request $request) {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logout Successfully'
        ]);
    }
}
