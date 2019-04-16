@extends('layouts.admin')
@section('content')


<nav class="breadcrumb">
    <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('admin/index')}}">首页</a>

    <span class="c-gray en">&gt;</span>

    分类中心
    <span class="c-gray en">&gt;</span>

    分类管理

    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"

       href="javascript:location.replace(location.href);" title="刷新">

        <i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin"
               class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })"
               id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户
        </button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                               class="btn btn-danger radius"><i
                        class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>

            <a href="javascript:;"
               onclick="member_add('添加分类','{{url('admin/category/create')}}','','510')"
               class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加分类</a>

        </span> <span class="r">共有数据：<strong>88</strong> 条</span>
    </div>
    <div class="mt-20">
        <form action="">

        <input type="hidden" name="_method" value="delete">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="80">ID</th>
                <th width="100">名称</th>
                <th width="40">标题</th>
                <th width="90">关键词</th>
                <th width="150">描述</th>
                <th width="">点击率</th>
                <th width="130">排序</th>
                <th width="70">cate_pid</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($data as $v)
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{$v->cate_id}}</td>
                <td><u style="cursor:pointer" class="text-primary"
                       onclick="member_show('{{$v->_cate_name}}','member-show.html','10001','360','400')">{{$v->cate_name}}</u></td>
                <td>{{$v->cate_title}}</td>
                <td>{{$v->cate_keywords}}</td>
                <td>{{$v->cate_desc}}</td>
                <td class="text-l">{{$v->cate_view}}</td>
                <td>{{$v->cate_order}}</td>
                <td class="td-status"><span class="label label-success radius">{{$v->cate_pid}}</span></td>
                <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')"
                                         href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a
                            title="编辑" href="javascript:;"
                            onclick="member_edit('编辑','{{url('admin/category/'.$v->cate_id.'/edit')}}','4','','510')" class="ml-5"
                            style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a
                            style="text-decoration:none" class="ml-5"
                            onClick="change_password('修改密码','change-password.html','10001','600','270')"
                            href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" dataid="{{$v->cate_id}}"
                                                                                                         href="javascript:;"
                                                                                                         onclick="member_del(this,{{$v->cate_id}})"
                                                                                                         class="ml-5"
                                                                                                         style="text-decoration:none"><i
                                class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>

                @endforeach
            </tbody>
        </table>

        </form>

        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">

            {{$data->links()}}
        </div>

    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">


    /*用户-添加*/
    function member_add(title, url, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-查看*/
    function member_show(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-停用*/
    function member_stop(obj, id) {
        layer.confirm('确认要停用吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function (data) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!', {icon: 5, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-启用*/
    function member_start(obj, id) {
        layer.confirm('确认要启用吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function (data) {
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                    $(obj).remove();
                    layer.msg('已启用!', {icon: 6, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }

    /*用户-编辑*/
    function member_edit(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*密码-修改*/
    function change_password(title, url, id, w, h) {
        layer_show(title, url, w, h);
    }

    /*用户-删除*/
    function member_del(obj, id) {

        layer.confirm('确认要删除吗？', function (index) {
            {{--$.post("{{url('admin/category')}}/" +id ,{'_method':'delete', '_token':"{{csrf_token()}}"},function () {--}}

            {{--})--}}
          
            $.ajax({
                type: 'delete',
                url: '{{url('admin/category')}}'+'/'+id ,
                dataType: 'json',
                data: {_method: 'delete', _token: "{{csrf_token()}}"},
                success: function (data) {
                    if (data.res==1){
                        layer.msg(data.msg,{
                            icon: 6,
                            time: 400
                        },function () {
                            return location.href= "javascript:location.replace(location.href);";
                        })
                       // alert('delete success');
                    }
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>


@endsection