<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Qiniu\Storage\UploadManager;
use Qiniu\Auth;

class ImgController extends Controller
{
    private $bucket;

    function __construct($bucket)
    {
        $this->bucket = $bucket;
    }

    public function updateImg($name,$path)
    {
        $upManager = new UploadManager();
        $auth = new Auth(config('QINIU_AK'), config('QINIU_SK'));
        $token = $auth->uploadToken($this->bucket);
        list($ret, $error) = $upManager->putFile($token, $name, $path);
        return $ret;
    }


}
