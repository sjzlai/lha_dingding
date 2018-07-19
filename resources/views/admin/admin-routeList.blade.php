@extends('layouts.app')
@section('title', '权限角色-列表')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection
<div class="am-cf admin-main">

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
    </div>



    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form" method="post" action="/admin/routeBind"  id="formBind" name="addForm" >
          <input type="hidden" name="_token" value=" {{ csrf_token()}}">
          <input type="hidden" name="jobId" value=" {{$jobId}}">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" onclick="swapCheck()"/></th>
                <th class="table-id">ID</th>
                <th class="table-id">路由</th>
                <th class="table-id">请求方法</th>
                <th class="table-set" id="bind" style="display:none"> <button class="am-btn am-btn-default am-btn-xs"><span class=""></span> 绑定路由</button></th>

              </tr>
          </thead>

          @foreach($list as $infos)
          <tr class="trr">
            <td><input type="checkbox" name="routeId[]" value="{{$infos['uri']}}" /></td>
            <td>{{$infos['id']}}</td>
            <td>{{$infos['uri']}}</td>
            <td>{{$infos['method']}}</td>
            <td>
              <div class="am-btn-toolbar">

              </div>
            </td>
          </tr>
          @endforeach




          </tbody>

        </table>
          <div class="am-cf">
  共  条记录

  <div class="am-fr">

  </div>

</div>
          <hr />
          <p>注：.....</p>
        </form>
      </div>

    </div>
  </div>
  <!-- content end -->





  <script>

      $("#excelDown").click(function(){

          window.location.href="/admin/tbOrderExcelDown";

      });
      $("#add").click(function(){

          window.location.href="/admin/tbOrderAddForm";

      });

      $("input[type='checkbox']").click(function() {
          $("#bind").css("display","block");

      });

      $("#bind").click(function () {
          var _token = $('input[name=_token]').val();
        $("#formBind").submit();
      });

      //checkbox 全选/取消全选
      var isCheckAll = false;
      function swapCheck() {
          if (isCheckAll) {
              $("input[type='checkbox']").each(function() {
                  this.checked = false;

              });
              isCheckAll = false;
          } else {
              $("input[type='checkbox']").each(function() {
                  this.checked = true;

              });
              isCheckAll = true;
          }
      }


  </script>
@endsection