<?php

namespace App\Http\Middleware;

use App\Http\Controllers\LoginController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class shfty
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
        // if($request->age >= 18){
        //     return LoginController::ageCheck();
        // } 
        // elseif($request->name == 'zohaib')
        // {
        //     return LoginController::nameCheck();}
        // // }  else
        // // {
        // //     dd('shaty taat');
        // // }
        // return $next($request);
        $user = User::where('email' , $request->email)->first();
        if(!$user) {
            return response()->json([
                'message' => 'User Not Found Sign In First',
                'sing_up_route' =>route('signup'),

            ], 401 );
        }
        return $next($request);
    }
}
