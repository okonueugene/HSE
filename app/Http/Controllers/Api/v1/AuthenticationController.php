<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(LoginRequest $request)
    {
        //validate request
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
        ];

        $this->validate($request, $rules, $messages);

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = Auth::user()->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Successfully logged in use the token below to authenticate your requests',
            'user' => UserResource::make(Auth::user()),
            'token' => $token]);

    }

    public function logout()
    {

        if (Auth::check()) {
            Auth::user()->tokens()->delete();

            return response()->json(['message' => 'Successfully logged out']);
        }

        return response()->json(['message' => 'Not authenticated'], 401);

    }

}
