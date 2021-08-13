<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class GeneralAdmin
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
        $user = Auth::user();
        
        if(!$user){
            return redirect()->route('login');
        }
    
        if($user->type == 1 || $user->type == 2 || $user->type == 3){
           return $next($request);
        }
        return abort(404);
    }
}
