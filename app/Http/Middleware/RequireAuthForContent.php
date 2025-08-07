<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireAuthForContent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            // Store the intended URL to redirect after login
            session(['url.intended' => $request->url()]);
            
            // For AJAX requests, return JSON response
            if ($request->expectsJson()) {
                return response()->json([
                    'error' => 'Authentication required',
                    'message' => 'Please login to access this content',
                    'redirect' => route('login')
                ], 401);
            }
            
            // For regular requests, redirect to login with message
            return redirect()->route('login')->with('error', 'Please login to access this content.');
        }

        return $next($request);
    }
}
