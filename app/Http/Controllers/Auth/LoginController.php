<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login-request');
    }
    public function store(Request $request)
    {
        $loginMessages = [
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password field is required.',
        ];

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], $loginMessages);

        $credentials = $request->only('email', 'password');

        // Check if email exists in the database
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'The email does not exist in our records.'])->withInput($request->only('email'));
        }

        if (Auth::attempt($credentials)) {
            // Check if the user is banned
            if (Auth::user()->banned_at !== null) {
                Auth::logout();
                return redirect()->route('banned');
            }

            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'The password provided is incorrect.',
        ])->withInput($request->only('email'));
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
