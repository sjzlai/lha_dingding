<?php

namespace App\Http\Middleware;

use App\Http\Model\User;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminLogin
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
        if(!Session::has('user')){
            return redirect('admin/login');
        }
        return $next($request);



    }
}
