@extends('layouts.admin')
@section('content')

<div class="pd-20">
    <form class="Huiform" action="{{url('admin/pass')}}" method="post">

        {{csrf_field()}}
        <table class="table">
            <tbody>
            <tr>
                <th width="100" class="text-r"><span class="c-red">*</span>原密码：</th>
                <td><input type="password" style="width:200px" class="input-text" value="" id="user_pass" name="user_pass"></td>
            </tr>

            <tr>
                <th width="100" class="text-r"><span class="c-red">*</span>新密码：</th>
                <td><input type="password" style="width:200px" class="input-text" value="" id="teacher-new-password" name="new_pass"></td>
            </tr>
            <tr>
                <th class="text-r"><span class="c-red">*</span> 确认密码：</th>
                <td><input type="password" style="width:200px" class="input-text" value="" id="teacher-new-password2" name="confirm_pass"></td>
            </tr>
            <tr>
                <th></th>
                <td><button class="btn btn-success radius" type="submit"><i class="icon-ok"></i> 确定</button></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F080836300300be57b7f34f4b3e97d911' type='text/javascript'%3E%3C/script%3E"));
</script>

    @endsection