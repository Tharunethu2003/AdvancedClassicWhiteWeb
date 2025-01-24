<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        // If the user is authenticated, redirect to the appropriate dashboard
        if (Auth::check()) {
            return redirect()->route('home'); // Redirect to the home page (no personalization)
        }

        return $next($request);
    }
}
