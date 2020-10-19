<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
//use App\Http\Middleware\Authenticate;
//use Illuminate\Support\Facades\Auth;

class UserIsSupport
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
        $roles = $user->roles;
     //   dd($roles);
       foreach($roles as $role){
           if ($role->role == "support") {
            return $next($request);
           }
       }
       return redirect(route('home'));
        

    }
}
