<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    //登录
    public function login()
    {
        //处理post请求
        if ($input = Input::all()){
            $user = User::first();
            if ($input['user_name'] == $user->user_name &&
                $input['user_pass'] == Crypt::decrypt($user->user_pass)) {

                session(['user'=> $user]);
                return redirect('admin/index');
            } else {
                return "用户名或密码错误";
            }
        }

        //处理get请求
        return view('admin.login');
    }

    //退出
    public function quit(){
        session(['user'=> null]);
        return redirect('admin/login');
    }



}
