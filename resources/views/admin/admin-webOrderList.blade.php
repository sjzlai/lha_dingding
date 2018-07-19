@extends('layouts.app')
@section('title', '官网订单已完成-列表')
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
                <th class="table-author">订单号</th>
                <th class="table-date">用户id</th>
                <th class="table-date">支付状态</th>
                <th class="table-date">支付类型</th>
                <th class="table-date">优惠券id</th>
                <th class="table-date">优惠码id</th>
                <th class="table-date">积分</th>
                <th class="table-date">订单总价</th>
                <th class="table-date">支付总价</th>
                <th class="table-date">地址id</th>
                <th class="table-date">发货状态</th>
                <th class="table-date">快递单号</th>
                <th class="table-date">发票id</th>
                <th class="table-date">活动id</th>
                <th class="table-date">活动优惠价格</th>
                <th class="table-date">下单时间</th>
                <th class="table-date">支付时间</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          @foreach($info as $infos)
          <tr>
            <td><input type="checkbox" /></td>
            <td>{{$infos['id']}}</td>
            <td>{{$infos['order_number']}}</td>
            <td>{{$infos['member_id']}}</td>
            <td>{{$infos['pay_status']==1?'已支付':'为支付'}}</td>
            <td>{{$infos['paytype']}}</td>
            <td>{{$infos['coupon_id']}}</td>
            <td>{{$infos['coupon_code_id']}}</td>
            <td>{{$infos['integral']}}</td>
            <td>{{$infos['total_all_price']}}</td>
            <td>{{$infos['total_price']}}</td>
            <td>{{$infos['adress_id']}}</td>
            <td>{{$infos['post_status']}}</td>
            <td>{{$infos['post_number']}}</td>
            <td>{{$infos['boill_id']}}</td>
            <td>{{$infos['activity_id']}}</td>
            <td>{{$infos['activity_price']}}</td>
            {{--<td>{{$infos['goods']['order_id']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_number']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_attr_id']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_integral']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_title']}}</td>--}}
            {{--<td>{{$infos['goods']['gid']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_id']}}</td>--}}
            {{--<td>{{$infos['goods']['aid']}}</td>--}}
            {{--<td>{{$infos['goods']['goods_price']}}</td>--}}
              {{--<td>{{$infos['adress']['adress_id']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_name']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_tel']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_province']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_city']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_area']}}</td>--}}
              {{--<td>{{$infos['adress']['shr_address']}}</td>--}}
              {{--<td>{{$infos['adress']['type']}}</td>--}}
              {{--<td>{{$infos['adress']['province_name']}}</td>--}}
              {{--<td>{{$infos['adress']['city_name']}}</td>--}}
              {{--<td>{{$infos['adress']['area_name']}}</td>--}}
              {{--<td>{{$infos['adress']['zip_code']}}</td>--}}



            <td>{{date('Y-m-d',$infos['createtime'])}}</td>
            <td>{{date('Y-m-d',$infos['pay_time'])}}</td>

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
          {{--<div class="am-u-sm-12" id="tab" hidden="hidden">--}}
          {{--<tr>--}}
            {{--<th class="table-date">地址id</th>--}}
            {{--<th class="table-date">收货人姓名</th>--}}
            {{--<th class="table-date">收货人电话</th>--}}
            {{--<th class="table-date">省份</th>--}}
            {{--<th class="table-date">城市</th>--}}
            {{--<th class="table-date">县区</th>--}}
            {{--<th class="table-date">详细地址</th>--}}
            {{--<th class="table-date">默认地址</th>--}}
            {{--<th class="table-date">省份名</th>--}}
            {{--<th class="table-date">城市名</th>--}}
            {{--<th class="table-date">区名</th>--}}
            {{--<th class="table-date">邮政编码</th>--}}
          {{--</tr>--}}

          {{--</div>--}}



          </tbody>
        </table>
          <div class="am-cf">
  共 {{$info->total()}} 条记录
  <div class="am-fr">
    {!! $info->render()!!}
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

        window.location.href="/admin/webOrderExcelDown";

    });


</script>




@endsection