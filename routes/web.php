<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台登陆页
Route::get('/admin/login', 'Admin\LoginController@index');
//后台登陆操作
Route::post('/admin/logins', 'Admin\LoginController@login');
/**
 * @name 后台路由组
 * @midddleware auth 权限
 * @prefix admin 前缀
 * @namespace Admin 命名空间
 */
Route::group(['middleware' => ['adminLogin','adminAuth'],'prefix' => 'admin','namespace' => 'Admin'], function () {

    //后台首页视图
    Route::get('/', 'IndexController@index');
    //注册页面视图
    Route::get('/sign','SignController@index');

    //后台注册操作
    Route::post('/signs','SignController@sign');

    //退出登陆操作
    Route::get('/loginOut','LoginController@loginOut');

    //后台用户管理资源路由
    Route::resource('/user', 'UserController');

    //前台用户-网站用户列表
    Route::get('/webuser','ClientController@webUserList');

    //淘宝用户列表
    Route::get('/tbuser','ClientController@tbUserList');

    //淘宝用户添加表单
    Route::get('/tbUserForm','ClientController@tbUserForm');

    //淘宝用户添加操作
    Route::post('/tbUserAdd','ClientController@tbUserAdd');

    //淘宝用户编辑页面
    Route::get('/tbUserEditForm/{user_id}','ClientController@tbUserEditForm');

    //淘宝用户编辑操作
    Route::post('/tbUserEdit/{user_id}','ClientController@tbUserEdit');

    //整合用户列表
    Route::get('/mergeUser','ClientController@mergeUser');

    //短信群发表单
    Route::get('/msgSendForm','ClientController@msgSendForm');

    //短信群发
    Route::post('/msgSend','ClientController@msgSend');

    //淘宝用户列表excel导出
    Route::get('/tbUserExcelDown','ClientController@tbUserExcelDown');

    //官网用户列表excel导出
    Route::get('/webUserExcelDown','ClientController@webUserExcelDown');

    //官网订单列表
    Route::get('/webOrderList','OrderController@webOrderList');

    //淘宝用户订单列表
    Route::get('/tbOrderList','OrderController@tbOrderList');

    //淘宝用户订单添加表单
    Route::get('/tbOrderAddForm','OrderController@tbOrderAddForm');

    //淘宝用户订单添加
    Route::post('/tbOrderAdd','OrderController@tbOrderAdd');

    //淘宝订单excel导出
    Route::get('/tbOrderExcelDown','OrderController@tbOrderExcelDown');

    //官网订单excel导出
    Route::get('/webOrderExcelDown','OrderController@webOrderExcelDown');

    //钉钉获取access_token
    Route::get('/getDingAccessToken','DingTalkController@getAccessToken');

    //钉钉获取userinfo
    Route::get('/getDingUserInfo','DingTalkController@getUserInfo');

    //钉钉获取部门列表
    Route::get('/getDepartmentList','DingTalkController@getDepartmentList');

    //获取叮叮外部联系人列表
    Route::get('/getExternalContacts','DingTalkController@getExternalContacts');

    //获取官网箱子列表
    Route::get('/getWebCaseList','CaseController@webCaseList');

    //官网箱子列表excel下载
    Route::get('/caseListExcelDown','CaseController@caseListExcelDown');

    //代理商列表
    Route::get('/agentList','AgentController@getAgentList');

    //角色权限列表
    Route::get('/getJobList','AuthController@getJobList');

    //获取路由列表
    Route::get('/getRouteList','AuthController@addRoute');

    Route::get('/getAi','DingTalkController@getAi');

    //提交路由绑定
    Route::post('/routeBind','AuthController@routeBind');

    Route::get('/addRoute','AuthController@addRoute');










});
