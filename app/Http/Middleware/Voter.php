<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Voter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect('/dashboard');
        }
        
        if (Auth::user()->role == 'voter') {
            return $next($request);
        }

    }
}
