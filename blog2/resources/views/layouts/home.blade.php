<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{\Illuminate\Support\Facades\Config::get('web.keywords')}}"/>
    <meta name="desc" content="{{\Illuminate\Support\Facades\Config::get('web.desc')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @yield('info')
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="/home/assets/i/favicon.png">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/home/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="/home/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileImage" content="/home/assets/i/app-icon72x72@2x.png">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="/home/assets/css/amazeui.min.css">
    <link rel="stylesheet" href="/home/assets/css/app.css">

    <style>
        .p {
            background: #78bbdd;
            border-radius: 2px;
            width: 25px;
            text-align: center;
            float: left;
            margin-right: 8px;
            list-style: none;
        }

        .active {
            color: white;
        }
    </style>

</head>

<body id="blog">

<nav class="am-g am-g-fixed blog-fixed blog-nav">
    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button"
            data-am-collapse="{target: '#blog-collapse'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="blog-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav" style="
    margin-top: 11px;
">

            <li>
                <h1 style="
    margin-top: 6px;
    margin-right: 200px;

">
                    @if(session("member"))
                        {{session("member.member_nickname")}} , Welcome !
                    @endif
                </h1>
            </li>

            <li class="am-active"><a style="cursor: pointer" href="{{url('/')}}">首页</a></li>
            @foreach($data as $k=>$v)
                <li><a href="{{url('home/nav/'.$v->nav_id)}} ">{{$v->nav_name}}</a></li>
            @endforeach
            <li><a style="cursor: pointer;
            font-weight: bold;margin-right: -40px;left: 74px;"
                   href="{{url('home/push')}}"> 发布</a>

            <li style="
    margin-left: 5px;
    left: 110px;
    top: 10px;
"><span>|</span></li>
            <li><a style="cursor: pointer;font-weight: bold;margin-right: -50px;left: 107px;" href="{{url('home/logout')}}">退出</a>
            </li>
        </ul>

        <form class="am-topbar-form am-topbar-right am-form-inline" role="search" style="
    margin-top: 19px;
">
            <div class="am-form-group">
                <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
            </div>
        </form>

    </div>


</nav>

@yield('content')

<footer class="blog-footer">
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-footer-padding">

        <div class="am-u-sm-12 am-u-md-4- am-u-lg-4" style="
    width: 602px;
    padding-left: 0;
    margin: -21px 321px;
    left: 0px;
">

            <ul style="list-style: none;">
                <li style="float: left; margin-right: 35px;"><h3 style="color: cornflowerblue;">友情链接</h3></li>
                @foreach($link as $l)
                    <li style="float: left; margin-right: 35px;">
                        <a href="{{$l->link_url}}">{{$l->link_name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="blog-text-center">{{\Illuminate\Support\Facades\Config::get('web.copyright')}}</div>
</footer>


<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/home/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/home/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script src="/home/assets/js/amazeui.min.js"></script>

<script src="/home/assets/js/jquery.min.js"></script>
<script>
    $(function () {
        $(".pagination li").addClass("p");
        $(".pagination li .active").addClass("active");
        $(".pagination").css('margin-top', '10px');
        $(".pagination").css('padding-left', '0px');
    });
</script>
</body>
</html>