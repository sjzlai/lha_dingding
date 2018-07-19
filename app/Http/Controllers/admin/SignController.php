<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SignController extends Controller
{

    public function index(){
        return view('admin.admin-sign');
    }
    public function sign(Request $request){
        if(User::where('username',$request->username)->first()){
            return back()->with('error','用户名已被占用');
        }
       if($request->username && $request->password){
           $data['username'] = trim($request->username);
           $data['password'] = Md5(config('app.md5str').trim($request->password));
            $res = User::create($data);

            if($res){
                return redirect('/admin/login');
            }
       }else{
           return back()->with('error','请输入账号密码');
       }
    }
}
