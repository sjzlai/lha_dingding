@extends('layouts.app')
@section('title', '官网箱子-列表')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-md-6 am-cf">
        <div class="am-fl am-cf">
          <div class="am-btn-toolbar am-fl">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
              <button type="button" id="excelDown" class="am-btn am-btn-default"><span class="am-icon-archive"></span> Excel表格导出</button>
              <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
            </div>

            <div class="am-form-group am-margin-left am-fl">
              <select>
                <option value="option1">所有类别</option>
                <option value="option2">IT业界</option>
                <option value="option3">数码产品</option>
                <option value="option3">笔记本电脑</option>
                <option value="option3">平板电脑</option>
                <option value="option3">只能手机</option>
                <option value="option3">超极本</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="am-u-md-3 am-cf">
        <div class="am-fr">
          <div class="am-input-group am-input-group-sm">
            <input type="text" class="am-form-field">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button">搜索</button>
                </span>
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
        <form class="am-form">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-author">箱子号</th>
                <th class="table-date">生产时间</th>
                <th class="table-date">箱子状态</th>
                <th class="table-date">省份id</th>
                <th class="table-date">流水线号</th>
                <th class="table-date">init</th>
                <th class="table-date">美国订单号</th>
                <th class="table-date">美国批号</th>
                <th class="table-date">中国批号</th>

                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          @foreach($caseList as $cases)
          <tr>
            <td><input type="checkbox" /></td>
            <td>{{$cases['case_id']}}</td>
            <td>{{$cases['casename']}}</td>
            <td>{{date('Y-m-d',$cases['createtime'])}}</td>
            <td>{{$cases['status']==1?'有效':'无效'}}</td>
            <td>{{$cases['provincenum']}}</td>
            <td>{{$cases['line']==0?"未分配":$cases['line']}}</td>
            <td>{{$cases['init']==0?"未操作":"添加订单号"}}</td>
            <td>{{$cases['usordernum']}}</td>
            <td>{{$cases['usbatchnum']}}</td>
            <td>{{$cases['chinaorder']}}</td>


            <td>
              <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                  <button class="am-btn am-btn-default am-btn-xs" id="more"><span class="am-icon-copy"></span> 更多</button>
                  <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                  <button class="am-btn am-btn-default am-btn-xs am-text-danger"><span class="am-icon-trash-o"></span> 删除</button>
                </div>
              </div>
            </td>
          </tr>
          @endforeach




          </tbody>
        </table>
          <div class="am-cf">
  共 {{$caseList->total()}} 条记录
  <div class="am-fr">
    {!! $caseList->render()!!}
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

        window.location.href="/admin/caseListExcelDown";

    });


</script>




@endsection