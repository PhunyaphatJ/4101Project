<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must loged in.');
        }
        
        if (Auth::user()->role != $role) {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
