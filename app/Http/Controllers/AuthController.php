<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $items = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $items['name'],
            'email' => $items['email'],
            'password' => bcrypt($items['password'])
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $items = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // get first user based on email
        $user = User::where('email', $items['email'])->first();

        // check if password match
        if(!$user || !Hash::check($items['password'], $user->password)) {
            return response([
                'message' => 'Wrong email or password.'
            ], 401);
        }

        $token = $user->createToken('mytoken')->plainTextToken;

        //user is just for check
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        Auth::user()->tokens->each(function($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out successfully.');
    }
}
