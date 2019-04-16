<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用 Laravel <span class="f-14">5.4.36</span> 后台管理系统</p>

	<p>上次登录IP：222.35.131.79.1 </p><p> 上次登录时间：2014-6-14 11:19:55</p>
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">操作系统</th>
				<td><span id="lbServerName"> {{PHP_OS}}</span></td>
			</tr>
			<tr>
				<td>运行环境</td>
				<td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
			</tr>
			<tr>
				<td>版本</td>
				<td>v-1.0</td>
			</tr>
			<tr>
				<td>时间 </td>
				<td>{{date('Y年 m月 d日 H时 i分 s秒')}}</td>
			</tr>
			<tr>
				<td>服务器域名 </td>
				<td> {{$_SERVER['SERVER_NAME']}}</td>
			</tr>

		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p> <br>
			Copyright &copy;2018-2019 Laravel 5.4.36 All Rights Reserved.<br>
		</p>
	</div>
</footer>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script>


</body>
</html>