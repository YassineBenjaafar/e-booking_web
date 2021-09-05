<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        if (Auth::guard("admin")->check()){
            $user = Auth::guard("admin")->user();
            //dd($user->roles);
            foreach($roles as $role) {
                // Check if user has the role This check will depend on how your roles are set up
                if($user->hasRole($role))                    
                    return $next($request);
                     
            }
            
            return redirect('/admin/home')->with('fail','acces denied !');
        }
        return redirect('/admin/login');
    }
}
