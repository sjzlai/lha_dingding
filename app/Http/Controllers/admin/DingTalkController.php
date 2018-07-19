<?php

namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Vendor\Taobao\Dingtalk\DingTalkClient;
use Vendor\Taobao\Request\CorpExtListRequest;

class DingTalkController extends Controller
{
    /**
     * @return mixed
     * @name 获取叮叮access_token
     * @author weikai
     */
    public static function getAccessToken(){
        $corpid = config('app.CORPID');
        $corpsecret = config('app.CORPSECRET');
        if(Cache::has('access_token')){
            return Cache::get('access_token');
        }else{
            $data = curl_get_https("https://oapi.dingtalk.com/gettoken?corpid=$corpid&corpsecret=$corpsecret");
            $data = json_decode($data,1);
            if($data['errcode']==0){
                Cache::put('access_token',$data['access_token'],'100');
                return Cache::get('access_token');
            }

        }


    }

    /**
     * @name 获取钉钉用户详情
     * @author weikai
     */
    public static function getUserInfo()
    {
        $access_token =self::getAccessToken();
        $data =curl_get_https("https://oapi.dingtalk.com/user/get?access_token=$access_token&userid=renwenshuo");
        dd($data);
    }

    /**
     * @name 获取部门列表
     * @author weikai
     */
    public static function getDepartmentList()
    {
        $access_token =self::getAccessToken();
        $data =curl_get_https("https://oapi.dingtalk.com/department/list?access_token=$access_token");
        dd($data);
    }

    /**
     * @name 获取钉钉外部联系人
     * @author weikai
     */
    public static function getExternalContacts($page,$offset)
    {
        $c = new DingTalkClient;
        $req = new CorpExtListRequest;
        $req->setSize($page);
        $req->setOffset($offset);
        $access_token = self::getAccessToken();
        $resp = $c->execute($req, $access_token);
        if($resp){
            return $resp->result;
        }

    }


    public function getAi()
    {

        $aa = curl_get_https("https://aip.baidubce.com/oauth/2.0/token?grant_type=client_credentials&client_id=HLfejarBNcVusyXeV3zg1iUA&client_secret=DS813SS2vhZ8PkxLsCZEeNSVhEsVkaWk");
       $aa = json_decode($aa,1);
       return $aa['access_token'];


    }









}
