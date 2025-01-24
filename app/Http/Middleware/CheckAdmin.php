<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        // Allow access to the admin login page (to prevent redirect loop)
        if ($request->is('admin/login')) {
            return $next($request);
        }

        // If the user is trying to access the admin panel but is not logged in
        if ($request->is('admin*') && !Auth::check()) {
            // Redirect them to the login page
            return redirect('admin/login');
        }

        // If the user is logged in and trying to access the admin panel, allow only admins
        if ($request->is('admin*') && Auth::check() && Auth::user()->email !== 'admin@example.com') {
            return redirect('/');
        }

        return $next($request);
    }
}
