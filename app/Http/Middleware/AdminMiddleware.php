<?php

namespace App\Http\Middleware;  // Add this line

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }
        
        // If not an admin, redirect or abort
        return redirect('/');
    }
    
}
