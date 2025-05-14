<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
{
    if (Auth::check()) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');  // Not an admin
        }
    } else {
        return redirect('/login');  // If not authenticated
    }
    
    return $next($request);
}

}
