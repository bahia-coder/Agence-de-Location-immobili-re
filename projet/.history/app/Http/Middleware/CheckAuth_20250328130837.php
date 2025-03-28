<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\CheckAuth as Middleware;
use Illuminate\Http\Request;

class CheckAuth extends Middleware
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
        // Add your custom authentication logic here
        if (!$request->user()) {
            return redirect('/login');
        }

        return $next($request);
    }
}