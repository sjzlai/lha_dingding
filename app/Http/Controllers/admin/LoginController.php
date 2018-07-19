<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

/**
 * Class LoginController
 * @package App\Http\Controllers\admin
 * @name 后台登陆控制器
 * @author weikai
 */
class LoginController extends Controller
{
    //加载登陆页面
    public function index()
    {
        return view('admin.index');
    }
    //登陆
    public function login(Request $request)
    {
        if($request->username){
            $username = trim($request->username);
            $resU =User::where('username',$username)->first();
            if(empty($resU)){
                return redirect('/admin/login')->with('error','没有此用户联系管理员');
                exit();
            }
            $resP = User::find($resU->id);
        }else{
            return back()->with('error','请输入用户名');
        }
        if($request->password){
            $pass = md5(config('app.md5str').$request->password);
        }else{
            return back()->with('error', '请输入密码');
        }


        if($pass!=$resU->password){
            return redirect('/admin/login')->with('error','密码错误');
            exit();
        }else{
            Session::put('user',$resP);
//            dd(Session::get('user'));
            return redirect('/admin');
        }


    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @name 退出登录
     * @author weikai
     */
    public function loginOut(Request $request)
    {
        if(!session('user')){
            return redirect('/admin/login');
        }

        $request->session()->flush();
        return redirect('/admin/login');
    }


    public function we(){

    }


}
