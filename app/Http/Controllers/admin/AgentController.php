<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vendor\Taobao\Dingtalk\DingTalkClient;


//代理商类
class AgentController extends Controller
{
    public function getAgentList(){
        $page = 20;//一页显示20条
        $offset = 0;//跳过几条
        $objData = DingTalkController::getExternalContacts($page,$offset);
        $objData = json_decode($objData,1);
//        dd($objData);
        return view('admin.admin-agentList',['agent'=>$objData]);
    }
}
