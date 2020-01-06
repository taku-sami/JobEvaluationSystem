<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::user()->auth === "admin")
        {
            return $next($request);
        }elseif(Auth::user()->auth === "boss1") {
            return redirect('/boss');
        }
        elseif(Auth::user()->auth === "boss2") {
            return redirect('/boss');
        }else{
            return redirect('/staff');
        }
    }
}
