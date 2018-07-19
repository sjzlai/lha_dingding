<?php

namespace App\Http\Middleware;

use App\Http\Model\User;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     * @name 权限控制中间件
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //如果用户为admin 通过 否则判断是否有权限
        if (session('user.username') == 'admin') {
            return $next($request);
        } else {
            $str = $request->path();
            $str = preg_replace('/(.*)\/{1}([^\/]*)/i', '$1', $str);
            //查询登陆用户是否有权限访问此路由
            $user = Session::get('user');
            $request->method() == 'GET' ? $method = 1 : $method = 2;
            $route = User::from('user as u')
                ->where('u.id', '=', $user->id)
                ->where('r.route', '=', $str)
                ->where('r.method', '=', $method)
                ->leftJoin('job as j', 'j.id', '=', 'u.job_id')
                ->leftJoin('route_node as r', 'r.job_id', '=', 'u.job_id')
                ->get();
            if (!$route->isEmpty()) {
                return $next($request);
            } else {
                return back()->with('error', '权限不足');
            }

        }
    }
}
