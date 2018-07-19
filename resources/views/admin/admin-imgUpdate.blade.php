@extends('layouts.app')
@section('title', '图片上传')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">图片上传</strong> / <small>tb</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li><a href="#tab2">详细描述</a></li>

    </ul>

    <div class="am-tabs-bd">


      <div class="am-tab-panel am-fade" id="tab2">
        <form class="am-form" action="/admin/updateForm" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value=" {{ csrf_token()}}">
          <input type="file" name="img" >



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
