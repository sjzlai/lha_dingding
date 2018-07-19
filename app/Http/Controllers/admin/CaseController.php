<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/**
 * Class CaseController
 * @package App\Http\Controllers\admin
 * @name 箱子类
 * @author weikai
 */
class CaseController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @name 官网箱子列表
     * @author weikai
     */
    public function webCaseList(Request $request)
    {
        $data = curl_get_https("https://www.lunghealthbiotech.com/admin.php?c=case&a=getCaseApi");
        $data = json_decode($data,1);

        $perPage = 5;                                                    // 每页显示数量
        if ($request->has('page')) {                                     // 请求是第几页，如果没有传page数据，则默认为1
            $current_page = $request->input('page');
            $current_page = $current_page <= 0 ? 1 :$current_page;
        } else {
            $current_page = 1;
        }

        $item = array_slice($data['data']['source'], ($current_page-1)*$perPage, $perPage);
        $total = count($data['data']['source']);
        $caseList  =new LengthAwarePaginator($item,$total, $perPage, $current_page, [
            'path' => Paginator::resolveCurrentPath(),                // 注释2
            'pageName' => 'page',
        ]);

        return view('admin.admin-webCaseList',['caseList'=>$caseList]);
    }

    /**
     * @name 官网箱子列表下载
     * @author weikai
     */
    public function caseListExcelDown()
    {
        //查询要生成表格的数据
        $data = curl_get_https("https://www.lunghealthbiotech.com/admin.php?c=case&a=getCaseApi");
        $data = json_decode($data,1);
        //处理数据
        foreach ($data['data']['source'] as $k=>$v){
            $keys =array_keys($v);
            $value[] = array_values($v);
        }
        ExcelController::excelDown("箱子列表",'xlsx',$keys,$value);
    }
}
