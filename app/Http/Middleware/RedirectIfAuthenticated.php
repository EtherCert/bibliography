<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
  public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           
            if(Auth::user()->type == 1 || Auth::user()->type == 2|| Auth::user()->type == 3)
            {
                return redirect(route('admin.dashboard'));
            }
            else if(Auth::user()->type == 0){
                return redirect(route('member.dashboard'));
            }
        }
        return $next($request);
    }
}
