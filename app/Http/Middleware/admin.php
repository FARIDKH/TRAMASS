<?php

namespace App\Http\Middleware;

use Closure;

class admin
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
        $request->email = "tramass";
        $request->password = "tramass";
        if($request->email && $request->password){
            return redirect('/admin');
        } else {
            return redirect('/');
        }
        return $next($request);
    }
}
