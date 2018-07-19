<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\Job;
use App\Http\Model\Route;
use App\Http\Model\RouteNode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

/**
 * Class AuthController
 * @package App\Http\Controllers\admin
 * @name 权限类
 * @author weikai
 */
class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @name 获取权限角色列表
     * @author weikai
     */
    public function getJobList()
    {
        $info  = Job::paginate(5);
        if(!$info){
           return  back()->with('error','没有数据');
        }
        return view("admin.admin-authJob",['list'=>$info]);

    }



    public function routeBind()
    {
        $input = Input::except('_token');


//        dd($input);
        $data['job_id'] = $input['jobId'];
        $data['route'] = $input['routeId'];
            $res = RouteNode::created($input);
            if($res){
                return response()->json(null,1,'成功');
            }


    }


    public function addRoute()
    {
        $input = Input::get();
        $app = app();
        $routes = $app->routes->getRoutes();
        foreach ($routes as $k=>$value){
            $path[$k]['id'] = $k+1;
            $path[$k]['uri'] = $value->uri;

            $path[$k]['method'] = $value->methods[0];

        }
        return response()->view("admin.admin-routeList",['list'=>$path,'jobId'=>$input['jodId']]);
    }


}
