<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckIfVerified
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
    	if (\Auth::user()->status !== 1 || \Auth::user()->verifyToken !== null) {
    		Auth::logout();
    		\Session::flash('warning', 'Please verify your email first!');
    		return redirect('/');
	    }
        return $next($request);
    }
}
