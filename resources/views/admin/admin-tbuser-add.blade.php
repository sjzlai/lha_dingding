@extends('layouts.app')
@section('title', '淘宝用户管理-添加淘宝用户')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">淘宝用户添加</strong> / <small>tb</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li><a href="#tab2">详细描述</a></li>

    </ul>

    <div class="am-tabs-bd">


      <div class="am-tab-panel am-fade" id="tab2">
        <form class="am-form" action="/admin/tbUserAdd" method="post">
          <input type="hidden" name="_token" value=" {{ csrf_token()}}">

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              用户名
            </div>
            <div class="am-u-sm-4">
              <input type="text" class="am-input-sm" name="user_name" id="user_name">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              手机号
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="phone" id="phone">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>



          <div class="am-g am-margin-top-sm">
            <div class="am-u-sm-2 am-text-right">
              备注信息
            </div>
            <div class="am-u-sm-10">
              <textarea name="remark" rows="6" placeholder="请输入备注信息" id="remark"></textarea>
            </div>
          </div>

          <div class="am-u-sm-2 am-text-right">
            状态
          </div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="status" value="1" id="option1"> 正常
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="status" value="2" id="option2"> 待审核
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="status"  value="3" id="option3"> 不显示
              </label>
            </div>
          </div>
          <div class="am-margin">
          <input id="Submit1" type="submit" class="am-btn am-btn-primary am-btn-xs" value="提交"/>
          </div>
        </form>
      </div>



    </div>
  </div>


</div>
<!-- content end -->

</div>



@endsection
