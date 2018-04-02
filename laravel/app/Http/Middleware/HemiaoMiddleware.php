<?php

namespace App\Http\Middleware;

use Closure;

class HemiaoMiddleware
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
        //记录请求路径
        // $str = '['.date('Y-m-d H:i:s').']'.$request->ip().'------'.$request->path();
        //存入日志文件
        // file_put_contents('request.log', $str."\r\n",FILE_APPEND);
        return $next($request);
    }
}
