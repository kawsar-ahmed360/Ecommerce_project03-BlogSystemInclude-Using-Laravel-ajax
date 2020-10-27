<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\support\facades\auth;


class UserRole
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

        if (Auth::user()->user_role ==1) {
            
            return redirect(route('customerss'));
        }
        return $next($request);
    }
}
