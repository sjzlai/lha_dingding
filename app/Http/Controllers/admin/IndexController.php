<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 * @package App\Http\Controllers\admin
 * @name 后台首页控制器
 * @author weikai
 */
class IndexController extends Controller
{
    //首页视图
    public function index(){
        return view('admin.admin-index');
    }
}
