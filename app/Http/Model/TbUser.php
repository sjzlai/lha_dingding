<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TbUser extends Model
{

    protected $table = 'tb_user'; //表名
    protected $primaryKey = 'id'; //主键
    public $timestamps = 'ture'; //自动维护时间
    protected $guarded = []; //批量添加字段黑名单
}
