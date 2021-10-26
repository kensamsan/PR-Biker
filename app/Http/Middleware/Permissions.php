<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Log;
class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$permissions)
    {
        if (!Auth::check()) 
        return redirect('/');

        $user = Auth::user();

    
        if($user->checkPrivileges($permissions)>0)
            return $next($request);


        return abort(403, 'Unauthorized action.');
    }
}
