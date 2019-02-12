<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        $user = Auth::user();
        foreach ($user->roles as $role){
            if($role->name == 'Admin'){
                return $next($request);
            }
        }

        return redirect('/')->with('message','You have no rules');



    }
}
