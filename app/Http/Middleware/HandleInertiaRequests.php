<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HandleInertiaRequests
{
    /**
     * The handle method is where we can add shared data to the Inertia response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Add shared data that will be available in all Inertia responses
        Inertia::share([
            'auth' => [
                'user' => $request->user(),  // Share user data with Inertia
            ],
            'flash' => [
                'message' => session('message'),  // Share session messages
            ],
            // Add more shared data as needed
        ]);

        return $next($request);
    }
}
