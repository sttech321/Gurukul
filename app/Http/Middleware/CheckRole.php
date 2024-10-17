<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the authenticated user has the correct role
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Redirect to a different page if the user doesn't have the required role
            return redirect('/dashboard'); // Or any other fallback page
        }

        return $next($request);
    }
}
