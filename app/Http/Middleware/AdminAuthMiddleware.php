<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has 'admin' or 'super' role
        if (!Auth::guard('web')->check() || (Auth::user()->role !== 'admin') || (Auth::user()->status !== 'active')) { //&& Auth::user()->role !== 'super'
            
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
        return $next($request);
    }
}
