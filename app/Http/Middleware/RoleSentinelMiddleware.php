<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel,Session;
class RoleSentinelMiddleware
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
        if(Sentinel::inRole('user')){
        return $next($request);
        }
        else  if(Sentinel::inRole('admin'))
        {
            return $next($request);
        }
        else
        {
            
            return redirect()->route('log-in.index');
        }
    }
}
