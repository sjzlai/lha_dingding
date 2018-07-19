@extends('layouts.app')
@section('title', '权限角色-列表')
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
              <button type="button" id="add" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
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
                <th class="table-id">角色</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>

          @foreach($list as $lists)
          <tr>
            <td><input type="checkbox" /></td>
            <td id="jobId">{{$lists['id']}}</td>
            <td>{{$lists['job']}}</td>



            <td>
              <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                  <a href="/admin/addRoute?jodId={{$lists['id']}}" class="am-btn am-btn-default am-btn-xs" id="more"><span class="am-icon-copy"></span> 添加权限路由</a>
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
  共 {{$list->total()}} 条记录

  <div class="am-fr">
    {!! $list->links() !!}
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



</script>




@endsection