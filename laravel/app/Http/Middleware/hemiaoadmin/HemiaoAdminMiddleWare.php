<?php

namespace App\Http\Middleware\HeMiaoAdmin;

use Closure;

class HemiaoAdminMiddleWare
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

        if(session('userinfo')==null && $request->path() != 'login' && !$request->isMethod('get')){
            return redirect("/login");  
        }
        return $next($request);
    }
}
