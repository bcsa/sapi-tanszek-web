<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response('true');
        }

        return response()->json(['errors' => ['email' => ['The provided credentials do not match our records.']]], 422);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        Auth::login($user);

        return response('true');
    }

    public function saveUsername(User $user, Request $request)
    {
        if ($user->id === Auth::user()->id) {
            $user->name = $request->input('username');
            return $user->save();
        }
    }

    public function saveSettings(User $user, Request $request)
    {
        if ($user->id === Auth::user()->id) {
            $user->settings = $request->input('settings');
            return $user->save();
        }
    }
}
