@extends('layouts.admin')
@section('content')

{{--    <style>--}}
{{--        .p{--}}
{{--            background: #78bbdd;--}}

{{--            width: 25px;--}}
{{--            text-align: center;--}}
{{--            float: left;--}}
{{--            margin-left: 10px;--}}
{{--        }--}}

{{--        .active{--}}
{{--            background: orange;--}}
{{--            color:white;--}}
{{--        }--}}
{{--    </style>--}}

    <nav class="breadcrumb">
        <i class="Hui-iconfont">&#xe67f;</i> <a href="{{url('admin/index')}}">首页</a>

        <span class="c-gray en">&gt;</span>

        网站配置中心
        <span class="c-gray en">&gt;</span>

        网站配置管理

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
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜配置
            </button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                                   class="btn btn-danger radius"><i
                            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>

            <a href="javascript:;"
               onclick="member_add('添加配置','{{url('admin/conf/create')}}','','510')"
               class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 添加配置</a>



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
                        <th width="100">配置名称</th>
                        <th width="40">标题</th>
                        <th width="90">内容</th>
                        <th width="150">排序</th>
                        <th width="150">提示</th>
                        <th width="150">类型</th>
                        <th width="150">值</th>
                        <th width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($data as $v)
                        <tr class="text-c">
                            <td><input type="checkbox" value="1" name=""></td>
                            <td>{{$v->conf_id}}</td>
                            <td><u style="cursor:pointer" class="text-primary"
                                   onclick="member_show('{{$v->conf_id}}','member-show.html','10001','360','400')">{{$v->conf_name}}</u></td>
                            <td>{{$v->conf_title}}</td>
                            <td>{!! $v->_html !!}</td>
                            <td>{{$v->conf_order}}</td>
                            <td>{{$v->conf_tips}}</td>
                            <td>{{$v->field_type}}</td>
                            <td>{{$v->field_value}}</td>


                             <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')"
                                                     href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a
                                        title="编辑" href="javascript:;"
                                        onclick="member_edit('编辑','{{url('admin/conf/'.$v->conf_id.'/edit')}}','4','','510')" class="ml-5"
                                        style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a
                                        style="text-decoration:none" class="ml-5"
                                        onClick="change_password('修改密码','change-password.html','10001','600','270')"
                                        href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除"
                                                                                                                     href="javascript:;"
                                                                                                                     onclick="member_del(this,{{$v->conf_id}})"
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

        /* -添加*/
        function member_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }



        /* -编辑*/
        function member_edit(title, url, id, w, h) {
            layer_show(title, url, w, h);
        }



        /* -删除*/
        function member_del(obj, id) {

            layer.confirm('确认要删除吗？', function (index) {

                $.ajax({
                    type: 'delete',
                    url: '{{url('admin/conf')}}'+'/'+id ,
                    dataType: 'json',
                    data: {_method: 'delete', _token: "{{csrf_token()}}"},
                    success: function (data) {
                        if (data.status==1){
                            layer.msg(data.msg,{
                                icon: 6,
                                time: 400
                            },function () {
                                return location.href= location.href;
                            })

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