<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class NavsController extends Controller
{
    //列表
    public function index(){

        $data= Navs::orderby('nav_order','asc')->paginate(3);
        return view('admin.navs.index',compact('data'));
    }

    //创建
    public function create(){
        return view('admin/navs/create');
    }

    //处理创建请求
    public function store(){

        $input= Input::except('_token');

        $nav= Navs::create($input);
        if ($nav){
            echo '创建成功';
        }else{
            echo '创建失败';
        }
    }

    //编辑
    public function edit($id){
        $data= Navs::find($id);

        return view('admin/navs/edit',compact('data'));
    }

    //处理编辑请求
    public function update($id){
        $input= Input::except('_method','_token');
        $nav= Navs::find($id);
        if ($nav){
            $res= Navs::where('nav_id',$id)->update($input);
            if ($res){
                echo '编辑成功';
            }else{
                echo '编辑失败';
            }
        }
    }

    //删除
    public function destroy($id){

        $nav= Navs::find($id);

        if ($nav){
            $res= $nav->delete();
            if ($res){
                return response()->json([
                    'status'=>1,
                    'msg'=> '删除成功'
                ]);
            }else{
                return response()->json([
                    'status'=> 0,
                    'msg'=> '删除失败'
                ]);
            }
        }
    }
}
