@extends('layouts.app')
@section('title', '淘宝订单-列表')
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
                <th class="table-author">产品编号</th>
                <th class="table-date">是否开发票</th>
                <th class="table-date">发票编号</th>
                <th class="table-date">售价</th>
                <th class="table-date">支付方式</th>
                <th class="table-date">折扣</th>
                <th class="table-date">购买渠道</th>
                <th class="table-date">订单编号</th>
                <th class="table-date">姓名</th>
                <th class="table-date">联系方式</th>
                <th class="table-date">寄出时间</th>
                <th class="table-date">地址</th>
                <th class="table-date">快递单号</th>
                <th class="table-date">是否回访</th>
                <th class="table-date">创建时间</th>
                <th class="table-date">修改时间</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
            @if($info)
          @foreach($info as $infos)
          <tr>
            <td><input type="checkbox" /></td>
            <td>{{$infos['id']}}</td>
            <td>{{$infos['goods_num']}}</td>
            <td>{{$infos['is_bill']==1?'开发票':'不开发票'}}</td>
            <td>{{$infos['bill_num']}}</td>
            <td>{{$infos['price']}}</td>
            @if($infos['pay_type']==1)
            <td>pc支付宝</td>
            @endif
            @if($infos['pay_type']==2)
              <td>pc微信</td>
            @endif
            @if($infos['pay_type']==3)
              <td>h5微信</td>
            @endif
            @if($infos['pay_type']==4)
              <td>h5支付宝</td>
            @endif
            @if($infos['pay_type']==5)
              <td>公众号微信</td>
            @endif
            @if($infos['pay_type']==6)
              <td>淘宝</td>
            @endif
            @if($infos['pay_type']==7)
              <td>线下</td>
            @endif
            <td>{{$infos['discount']}}</td>
            <td>{{$infos['channel']}}</td>
            <td>{{$infos['order_number']}}</td>
            <td>{{$infos['name']}}</td>
            <td>{{$infos['tel']}}</td>
            <td>{{$infos['send_time']}}</td>
            <td>{{$infos['address']}}</td>
            <td>{{$infos['post_num']}}</td>
            <td>{{$infos['is_return_visit']}}</td>
            <td>{{$infos['created_at']}}</td>
            <td>{{$infos['updated_at']}}</td>

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
  共  条记录

  <div class="am-fr">
    {!! $info->links() !!}
  </div>

</div>
          @endif
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


</script>




@endsection