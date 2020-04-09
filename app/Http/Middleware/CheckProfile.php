<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckProfile
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
        if(Auth::user()->nik == null) { 
            return redirect(url('myprofile'))
                    ->with(['warning' => 'You must update your profile to continue transaction!']);
          }

          return $next($request);
        
    }
}
