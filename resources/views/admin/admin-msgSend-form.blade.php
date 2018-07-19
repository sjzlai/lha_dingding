@extends('layouts.app')
@section('title', '短信群发')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">短信群发</strong> / <small>整合用户</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li><a href="#tab2">详细描述</a></li>

    </ul>

    <div class="am-tabs-bd">


      <div class="am-tab-panel am-fade" id="tab2">
        <form class="am-form" action="/admin/msgSend" method="post">
          <input type="hidden" name="_token" value=" {{ csrf_token()}}">

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              短信模板id
            </div>
            <div class="am-u-sm-4">
              <input type="text" class="am-input-sm" name="templetId" id="templetId">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              参数1
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="param1" id="param1">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              参数2
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="param2" id="param2">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>





          <div class="am-u-sm-2 am-text-right">
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
