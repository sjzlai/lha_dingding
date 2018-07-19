<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href= {{asset("assets/i/favicon.png")}}>
    <link rel="apple-touch-icon-precomposed" href= {{asset("assets/i/app-icon72x72@2x.png")}}>
    <meta name="apple-mobile-web-app-title" content="  UI" />
    <link rel="stylesheet" href= {{asset("assets/css/amazeui.min.css")}}/>
    <link rel="stylesheet" href= {{asset("assets/css/admin.css")}}>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src= {{asset("assets/js/polyfill/rem.min.js")}}></script>
    <script src= {{asset("assets/js/polyfill/respond.min.js")}}></script>
    <script src= {{asset("assets/js/amazeui.legacy.js")}}></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src= {{asset("assets/js/jquery.min.js")}}></script>
    <script src= {{asset("assets/js/amazeui.min.js")}}></script>
    <!--<![endif]-->
    <script src= {{asset("assets/js/app.js")}}></script>
    <script src= {{asset("layer/layer.js")}}></script>
</head>
<body>
<div class="am-cf admin-main">


@section('body')
    <header class="am-topbar admin-header">
        <div class="am-topbar-brand">
            <strong> </strong> <small>后台管理</small>
        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
                <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                        <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                        <li><a href="/admin/loginOut"><span class="am-icon-power-off"></span> 退出</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
            </ul>
        </div>
    </header>
    @section('cebian')
        <!-- sidebar start -->
        <div class="admin-sidebar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="/admin/"><span class="am-icon-home"></span> 首页</a></li>
                {{--后台管理员用户--}}
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 后台用户管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav">
                        <li><a href="/admin/user/" class="am-cf"><span class="am-icon-check"></span> 后台用户列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="/admin/getJobList/"><span class="am-icon-puzzle-piece"></span> 权限角色列表</a></li>
                        <li><a href="/admin/getRouteList/"><span class="am-icon-th"></span> 后台路由列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                        <li><a href="admin-log.html"><span class="am-icon-calendar"></span> xx</a></li>
                        <li><a href="admin-404.html"><span class="am-icon-bug"></span> xx</a></li>
                    </ul>
                </li>
                {{--前台用户管理（包括tb用户）--}}
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 前台用户管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav">
                        <li><a href="/admin/webuser/" class="am-cf"><span class="am-icon-check"></span> 官网用户列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="/admin/tbuser/"><span class="am-icon-puzzle-piece"></span> 淘宝用户列表</a></li>
                        <li><a href="/admin/mergeUser"><span class="am-icon-th"></span> 整合用户列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                        <li><a href="/admin/msgSendForm"><span class="am-icon-calendar"></span> 短信群发管理</a></li>
                    </ul>
                </li>

                {{--订单管理--}}
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 订单管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav">
                        <li><a href="/admin/webOrderList" class="am-cf"><span class="am-icon-check"></span> 官网订单列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="/admin/tbOrderList/"><span class="am-icon-puzzle-piece"></span> 淘宝订单列表</a></li>
                        <li><a href="/admin/webOrderList"><span class="am-icon-th"></span> 整合订单列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    </ul>
                </li>

                {{--代理商管理--}}
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 代理商管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav">
                        <li><a href="/admin/agentList" class="am-cf"><span class="am-icon-check"></span> 代理商列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="/admin/getWebCaseList/"><span class="am-icon-puzzle-piece"></span> 产品箱子列表</a></li>
                        <li><a href="/admin/mergeUser"><span class="am-icon-th"></span> 整合列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    </ul>
                </li>

                {{--代理商管理--}}
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in " id="collapse-nav">
                        <li><a href="/admin/updateImg" class="am-cf"><span class="am-icon-check"></span> 图片上传<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="/admin/getWebCaseList/"><span class="am-icon-puzzle-piece"></span> x</a></li>
                        <li><a href="/admin/mergeUser"><span class="am-icon-th"></span> xx<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    </ul>
                </li>

                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 页面模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> 个人资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> 帮助页</a></li>
                        <li><a href="admin-gallery.html"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                        <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 系统日志</a></li>
                        <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li>
                    </ul>
                </li>
                <li><a href="admin-table.html"><span class="am-icon-table"></span> 表格</a></li>
                <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
                <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告 </p>
                    <p>时光静好，与君语；细水流年，与君同。—— Amaze</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>
                    <p>Welcome to the Amaze wiki!</p>
                </div>
            </div>
        </div>
        <!-- sidebar end -->

            @if (session('error'))
                <div class="alert alert-success">
                    {{ session('error') }};
                </div>
            @endif
            @if (session('message'))
                <div class="alert alert-success">

                   {{session('message')}};

                </div>
            @endif
    @show
@show
    </div>
<footer>
    <hr>
    <p class="am-padding-left">© 2018 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src= {{asset("assets/js/polyfill/rem.min.js")}}></script>
<script src= {{asset("assets/js/polyfill/respond.min.js")}}></script>
<script src= {{asset("assets/js/amazeui.legacy.js")}}></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src= {{asset("assets/js/jquery.min.js")}}></script>
<script src= {{asset("assets/js/amazeui.min.js")}}></script>
<!--<![endif]-->
<script src= {{asset("assets/js/app.js")}}></script>

<script>

</script>
</body>
</html>



