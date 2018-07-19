<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * @package App\Http\Model
 * @name 权限角色模型
 * @author weikai
 */
class Job extends Model
{
    protected $table = 'job'; //表名
    protected $primaryKey = 'id'; //主键
    public $timestamps = 'ture'; //自动维护时间
    protected $guarded = []; //批量添加字段黑名单
}
