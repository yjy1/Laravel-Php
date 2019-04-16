<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Comm;
use App\Http\Model\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //注册
    public function register()
    {
        return view('home/register');
    }

    //handle_reg
    public function handle_reg()
    {
        if ($input = Input::except('_token')) {
            $input['member_pass'] = Crypt::encrypt($input['member_pass']);
            $input['create_time'] = time();
            $res = Member::create($input);
            if ($res) {
                echo "<script>alert('注册成功');location.href='login'</script>";
            }
        }
    }

    //登录
    public function login()
    {
        if ($input = Input::except('_token')) {
            $member = Member::where('member_name', '=', $input['member_name'])->first();
            if (Crypt::decrypt($member->member_pass) == $input['member_pass']) {
                session(['member' => $member]);
                echo "<script>alert('yes');location.href= '/'</script>";
            } else {
                echo 'no';
            }
        }
        return view('home/login');
    }



}
