<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && $guard === 'user') {
            // ガード名が「user」の場合
            return redirect(RouteServiceProvider::HOME);
        } else if (Auth::guard($guard)->check() && $guard === 'admin') {
            // ガード名が「admin」の場合
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        return $next($request);
    }
}
