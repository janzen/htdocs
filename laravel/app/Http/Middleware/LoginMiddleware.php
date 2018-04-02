<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        //检测请求是否有session信息
        //session读取 session('name')
        //session设置 session(['uid'=>lee,'name'=>'xiaohigh'])
        if(!session('uid')){
            //跳转 redirect()
            return redirect('/login');
        }
        return $next($request);
    }
}
