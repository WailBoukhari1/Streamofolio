<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    // Show password reset form
    public function showResetForm(Request $request, $token)
    {
        return view('Auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    // Handle password reset
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Handle case where user is not found
            return back()->withErrors(['email' => __('User not found.')]);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // Log in the user after password reset
            Auth::login($user);

            // Redirect to the desired page after login
            return redirect()->route('login')->with('status', __('Password has been reset successfully.'));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
