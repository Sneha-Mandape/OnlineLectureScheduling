<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd(Auth::guard('admin')->check());

        if (!Auth::guard('admin')->check()) {
            // If not authenticated, redirect to the admin login page or perform any other action
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
