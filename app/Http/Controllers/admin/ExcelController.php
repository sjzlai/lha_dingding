<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;


class ExcelController extends Controller
{
    /**
     * @param $bottom excel 低栏
     * @param $title excel 文件名
     * @param $suffix excel 文件后缀名
     * @param $cellData excel 数据
     * @name excel 导出
     * @author weikai
     */
    public static function excelDown($title,$suffix,$headData,$cellData)
    {
        //处理数据
         array_unshift($cellData,$headData);

         //注入excel 类
        $excel = App::make('excel');
        $excel->create($title,function($excel) use ($cellData){
            $excel->sheet("tbUser-list", function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export($suffix);
    }

    /**
     * @param $filePath 文件路径
     * @name excel 导入
     * @author weikai
     */
    public static function import($filePath){
//        $filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
        $excel = App::make('excel');
        $excel->load($filePath, function($reader) {
            $data = $reader->all();
            return $data;
        });
    }
}
