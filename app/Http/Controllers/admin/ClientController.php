<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\TbUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Lance\Cloud\Facades\Cloud;

/**
 * Class ClientController
 * @package App\Http\Controllers\admin
 * @name 前台用户控制器
 * @author weikai
 */
class ClientController extends Controller
{
    /**
     * @name 网站用户列表
     * @author weikai
     */
    public function webUserList(Request $request){
       $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=user&a=getUserApi');
        $user = json_decode($curlData,1);
        $perPage = 5;                                                    // 每页显示数量
        if ($request->has('page')) {                                     // 请求是第几页，如果没有传page数据，则默认为1
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($user['data']['source'], ($current_page-1)*$perPage, $perPage);
        $total = count($user['data']['source']);
        $user  =new LengthAwarePaginator($item,$total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),                // 注释2
            'pageName' => 'page',
        ]);


        if($curlData){
            return view('admin.admin-webuser',['users'=>$user]);
        }
    }

    /**
     * @name 官网用户信息excel表格导出
     * @author weikai
     */
    public function webUserExcelDown()
    {
        //获取官网用户信息
        $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=user&a=getUserApi');
        $user = json_decode($curlData,1);

        //处理数据
        foreach ($user['data']['source'] as $k=>$v){
            $keys =array_keys($v);
            $value[] = array_values($v);
        }
        ExcelController::excelDown('官网用户列表','xlsx',$keys,$value);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 淘宝用户列表
     * @author weikai
     */
    public function tbUserList()
    {
        $tbUser = TbUser::paginate(5);
        return view('admin.admin-tbuser',['users'=>$tbUser]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 淘宝用户添加表单
     * @author weikai
     */
    public function tbUserForm(){
        return view('admin.admin-tbuser-add');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @name 淘宝用户添加操作
     * @author weikai
     */
    public function tbUserAdd(){

        $input = Input::except('_token');
        if($input){
            $res = TbUser::create($input);
            if($res){
                return back()->with('message',"添加成功 id 为$res->id");
            }else{
                return back()->with('error','添加失败');

            }
        }
    }

    /**
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 淘宝用户编辑页面
     * @author weikai
     */
    public function tbUserEditForm($user_id)
    {
        $users = TbUser::find($user_id);
        return view('admin.admin-tbuser-edit',['users'=>$users]);
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     * @name 淘宝用户编辑操作
     * @author weikai
     */
    public function tbUserEdit($user_id)
    {
        $input = Input::except('_token');
        $obj = TbUser::find($user_id);
        $obj->user_name = $input['user_name'];
        $obj->phone = $input['phone'];
        $obj->remark = $input['remark'];
        $obj->status = $input['status'];

        $res = $obj->save();
        if($res){
            return back()->with('message',"修该成功 ");
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * @name 淘宝用户信息 excel 导出
     * @author weikai
     */
    public function tbUserExcelDown()
    {
        //查询要生成表格的数据
        $info = TbUser::all()->toArray();
        //处理数据
        foreach ($info as $k=>$v){
            $keys =array_keys($v);
            $value[] = array_values($v);
        }
         ExcelController::excelDown('淘宝用户列表','xlsx',$keys,$value);


    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 合并用户列表
     * @author weikai
     */
    public function mergeUser(Request $request)
    {
        $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=user&a=getUserApi');
        $user = json_decode($curlData,1);
        foreach ($user['data']['source'] as $k=>$v){
            $arr[$k]['user_id'] = $v['user_id'];
            $arr[$k]['phone'] = $v['phone'];
        }
        $tbUser = TbUser::select('phone')->get()->toArray();
        $arr = array_merge($tbUser,$arr);

        $perPage = 5;                                                    // 每页显示数量
        if ($request->has('page')) {                                     // 请求是第几页，如果没有传page数据，则默认为1
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($arr, ($current_page-1)*$perPage, $perPage);
        $total = count($arr);
        $arr  =new LengthAwarePaginator($item,$total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),                // 注释2
            'pageName' => 'page',
        ]);
        return view('admin.admin-mergeUser',['users'=>$arr]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 群发短信表单
     * @author weikai
     */
    public function msgSendForm()
    {
        return view('admin.admin-msgSend-form');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @name 短信群发操作
     * @author weikai
     */
    public function msgSend()
    {
        $input = Input::except('_token');
        //请求官网用户接口
        $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=user&a=getUserApi');
        $user = json_decode($curlData,1);
        foreach ($user['data']['source'] as $k=>$v){
            $arr[$k]['user_id'] = $v['user_id'];
            $arr[$k]['phone'] = $v['phone'];
        }
        //淘宝用户信息
        $tbUser = TbUser::select('phone')->get()->toArray();
        //合并用户信息
        $arr = array_merge($tbUser,$arr);
        $arra[0] = ['phone'=>'15313888332'];
        $arra[1] = ['phone'=>'18210670405'];

        foreach ($arra as $v){
            $result[] = Cloud::sendTemplateSMS($v['phone'],[$input['param1'],$input['param2']],$input['templetId']);
        }
        global $n;
        $n =0;
        foreach ($result as $v){
            if($v['resultStatus']==true){
                return back()->with('message','短信发送成功');
            }else{
                $n++;
                return back()->with('error',"短信发送失败".$n."条");
            }
        }
    }
}
