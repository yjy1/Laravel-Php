<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    //首页
    public function index()
    {
        return view('admin.index');
    }

    //信息
    public function info()
    {
        return view('admin.welcome');
    }

    //修改密码
    public function pass()
    {
        if ($input = Input::all()) {

            $id = session('user.user_id');
            $user = User::find($id);
            $_password= Crypt::decrypt($user->user_pass);
            if ($input['user_pass']== $_password){
                $user-> user_pass= Crypt::encrypt($input['new_pass']);
                $result= $user->update();
                if ($result){
                    echo '修改成功';
                    return redirect('admin/index');
                }else{
                    echo '修改失败';
                }
            }else{
                echo '原密码错误';
            }

        }


        return view('admin.pass');
    }
}
