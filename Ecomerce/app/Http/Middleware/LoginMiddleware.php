<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // if($request->age < 18){
        //     return response()->json(["Age should be age plus"]) ;
        // }
        if($request->has('email') && $request->has('password')){
            return $next($request);

        }     
        return response()->json(['messagre' => "Login failed"], 401);
    }
}
