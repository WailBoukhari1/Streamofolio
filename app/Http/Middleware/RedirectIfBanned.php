<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and is banned
        if (Auth::check() && Auth::user()->banned_at !== null) {
            Auth::logout(); // Force logout the banned user
            return redirect()->route('banned'); // Redirect to the banned page
        }

        return $next($request);
    }
}
