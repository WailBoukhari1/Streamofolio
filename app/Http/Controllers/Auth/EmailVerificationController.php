<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function show()
    {
        return view('Auth.verify-email');
    }
    public function sendVerificationEmail(Request $request)
    {
        // Check if the user is logged in
        if ($request->user()) {
            // Check if the user has already verified their email
            if (!$request->user()->hasVerifiedEmail()) {
                // Send the verification email
                $request->user()->sendEmailVerificationNotification();

                return back()->with('status', 'A verification email has been sent to your email address. Please verify your email to activate your account.');
            } else {
                return back()->with('status', 'Your email is already verified.');
            }
        } else {
            return redirect()->route('verification.notice')->with('status', 'You must be logged in to perform this action.');
        }
    }
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user()->getKey()) {
            return redirect()->route('verification.notice')->withErrors(['message' => 'Unauthorized']);
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home')->withErrors(['message' => 'Email already verified']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->route('home')->with('status', 'Email successfully verified');
    }

}
