<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided crendentials are incorrect.']
            ]);
        }
        return $user->createToken('user login')->plainTextToken;
    }

    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return 'berhasil';
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}