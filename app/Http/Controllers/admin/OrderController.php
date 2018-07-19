<?php

namespace App\Http\Controllers\admin;

use App\Http\Model\TbOrder;
use App\Http\Model\TbUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

/**
 * Class OrderController
 * @package App\Http\Controllers\admin
 * @name 订单类
 * @author weikai
 */
class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 官网订单列表
     * @author weikai
     */
    public function webOrderList(Request $request)
    {
        $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=order&a=orderFinish');
        $orderInfo = json_decode($curlData,1);
//        dd($orderInfo);

        $perPage = 5;                                                    // 每页显示数量
        if ($request->has('page')) {                                     // 请求是第几页，如果没有传page数据，则默认为1
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($orderInfo['data']['source'], ($current_page-1)*$perPage, $perPage);
        $total = count($orderInfo['data']['source']);
        $orderInfo  =new LengthAwarePaginator($item,$total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),                // 注释2
            'pageName' => 'page',
        ]);

        return view('admin.admin-webOrderList',['info'=>$orderInfo]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 淘宝订单列表
     * @author weikai
     */
    public function tbOrderList()
    {
        $orderInfo = TbOrder::paginate(5);
        return view('admin.admin-tbOrderList',['info'=>$orderInfo]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 淘宝用户添加页面
     * @author weikai
     */
    public function tbOrderAddForm()
    {
        return view('admin.admin-tbOrderAdd');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @name 淘宝订单添加
     * @author weikai
     */
    public function tbOrderAdd()
    {
        //过滤数据
        $input = Input::except('_token');
        if(empty($input)){
           return back()->with('error','未提交数据');
        }

        //添加淘宝订单数据
        $res1 = TbOrder::create($input);
        //有用户信息就添加淘宝用户信息
        if($input['tel'] && $input['name']){
            $data['user_name'] =$input['name'];
            $data['phone'] =$input['tel'];
            $res =TbUser::create($data);
            if(!$res){
                return back()->with('error','淘宝用户未添加');
            }
        }


        if(!$res1){
            return back()->with('error','淘宝订单未添加');
        }
        return back()->with('message',"添加成功");
    }

    /**
     * @name 淘宝订单Excel下载
     * @author weikai
     */
    public function tbOrderExcelDown()
    {
        //查询要生成表格的数据
        $info = TbOrder::all()->toArray();
        //处理数据
        foreach ($info as $k=>$v){
            $keys =array_keys($v);
            $value[] = array_values($v);
        }
        ExcelController::excelDown('淘宝订单列表','xlsx',$keys,$value);
    }

    /**
     * @name 官网订单excel下载
     * @author weikai
     */
    public function webOrderExcelDown()
    {
        $curlData =  curl_get_https('https://www.lunghealthbiotech.com/admin.php?c=order&a=orderFinish');
        $orderInfo = json_decode($curlData,1);

        foreach ($orderInfo['data']['source'] as $k=>&$v){
            $v['goods']=null;
            $v['adress']=null;
            $v['boill']=null;
        }

        //处理数据
        foreach ($orderInfo['data']['source'] as $k=>$v){
            $keys =array_keys($v);
            $value[] = array_values($v);
        }



        ExcelController::excelDown('官网订单列表','xlsx',$keys,$value);
    }
}
