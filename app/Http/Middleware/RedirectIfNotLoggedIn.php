<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard=null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('admin');
        }
        return $next($request);
    }
}
