<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->api_token = Str::random(60);
            $user->save();
            return Auth::user()->makeVisible('api_token');
        }

        return response()->json(['message' => 'Invalid username or password'], 401);

    }
}
