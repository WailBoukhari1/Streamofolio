<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateAndVerify
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email_verified_at !== null) {
            return $next($request);
        }

        // Check if the current route is the email verification notice route
        if ($request->route() && $request->route()->named('verification.notice')) {
            // If it is, just proceed without redirection to prevent a loop
            return $next($request);
        }
        // If the user is not authenticated or email is not verified, redirect to the verification notice route
        return $request->expectsJson()
            ? abort(403, 'Unauthorized')
            : redirect()->route('verification.notice');
        
    }
}
