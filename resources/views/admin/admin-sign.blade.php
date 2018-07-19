<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>后台管理系统模板HTML登录界面 - cssmoban</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href={{asset("/assets/i/favicon.png")}}>
  <link rel="stylesheet" href={{asset("/assets/css/amazeui.min.css")}}>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>注册</h3>
    <hr>
    <div class="am-btn-group">
      @if (session('error'))
        <div class="alert alert-success">
          {{ session('error') }}
        </div>
      @endif
      <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
    </div>
    <br>
    <br>

    <form method="post" action="/admin/signs" class="am-form">
      {{ csrf_field() }}
      <label for="username">用户名:</label>
      <input type="username" name="username" id="username" value="">
      <br>
      <br>
      <label for="password">密码:</label>
      <input type="password" name="password" id="password" value="">
      <br>

      <div class="am-cf">

        <input type="submit" name="" value="注 册" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>

    <hr>
    <p>© 2014 版权所有.</p>
  </div>
</div>
</body>
</html>