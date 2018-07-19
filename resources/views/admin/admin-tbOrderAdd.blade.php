@extends('layouts.app')
@section('title', '淘宝订单添加')
@section('body')
  @parent
@section('cebian')
  @parent
@endsection

<!-- content start -->
<div class="admin-content">

  <div class="am-cf am-padding">
    <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">淘宝订单添加</strong> / <small>tb</small></div>
  </div>

  <div class="am-tabs am-margin" data-am-tabs>
    <ul class="am-tabs-nav am-nav am-nav-tabs">
      <li><a href="#tab2">详细描述</a></li>

    </ul>

    <div class="am-tabs-bd">


      <div class="am-tab-panel am-fade" id="tab2">
        <form class="am-form" action="/admin/tbOrderAdd" method="post">
          <input type="hidden" name="_token" value=" {{ csrf_token()}}">

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              产品编号
            </div>
            <div class="am-u-sm-4">
              <input type="text" class="am-input-sm" name="goods_num" id="goods_num">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>
          <div class="am-u-sm-2 am-text-right">
            是否开发票
          </div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="is_bill" value="1" id="option1"> 开发票
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="is_bill" value="2" id="option2"> 不开发票
              </label>

            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              发票编号
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="bill_num" id="bill_num">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              售价
            </div>
            <div class="am-u-sm-2 col-end">
              <input type="text" class="am-input-sm" name="price" id="price">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>



          <div class="am-u-sm-2 am-text-right">
            支付方式
          </div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="1" id="option1"> pc支付宝
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="2" id="option2"> pc微信
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="3" id="option2"> h5微信
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="4" id="option2"> h5支付宝
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="5" id="option2"> 公众号微信
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="6" id="option2"> 淘宝
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="pay_type" value="7" id="option2"> 线下
              </label>

            </div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              折扣
            </div>
            <div class="am-u-sm-2 col-end">
              <input type="text" class="am-input-sm" name="discount" id="discount">
            </div>
            <div class="am-u-sm-6">*小数</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              购买渠道
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="channel" id="channel">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              订单编号
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="order_number" id="order_number">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              姓名
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="name" id="name">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              联系方式
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="tel" id="tel">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              寄出时间
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="send_time" id="send_time">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              地址
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="address" id="address">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>

          <div class="am-g am-margin-top">
            <div class="am-u-sm-2 am-text-right">
              快递单号
            </div>
            <div class="am-u-sm-4 col-end">
              <input type="text" class="am-input-sm" name="post_num" id="post_num">
            </div>
            <div class="am-u-sm-6">*必填，不可重复</div>
          </div>
          <div class="am-u-sm-2 am-text-right">
            是否回访
          </div>
          <div class="am-u-sm-10">
            <div class="am-btn-group" data-am-button>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="is_return_visit" value="1" id="is_return_visit"> 回访
              </label>
              <label class="am-btn am-btn-default am-btn-xs">
                <input type="radio" name="is_return_visit" value="2" id="is_return_visit"> 未回访
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
