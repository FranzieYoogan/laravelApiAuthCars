<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request) {

        $validated = $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',

        ]);

        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([

            'user' => $user,
            'token' => $token,

        ]);

    }

    public function login(Request $request) {

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {

            return response()->json(['message' => 'Unauthorized'],401);

        } else {

            return response()->json([


                'user' => Auth::user(),
                'token' => Auth::user()->createToken('auth_token')->plainTextToken,

            ]);

        }

    }

    public function logout() {

        Auth::user()->token()->delete();

        return response()->json(['message' => 'logged out']);

    }

    public function me() {

        return response()-json(Auth::user());

    }

}
