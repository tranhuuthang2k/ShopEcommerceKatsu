<?php

namespace App\Http\Middleware;

use Closure;
use  Auth;
use Carbon\Carbon;
use Cache;
class Role
{
    /**
 * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
         
        if( !Auth::user()  || Auth::user()->role->name !== $role  )
         {
             return redirect()->route('login');
         }
         
         // check user is online/offline
            if(Auth::check())
        {
            $expiresAt = Carbon::now()->addMinutes(2);
       
            Cache::put('user-is-online'. Auth::user()->id,true,$expiresAt);
        }
           
         
        return $next($request);
    }
}
