<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class LinksController extends Controller
{
    //列表
    public function index(){
        $data= Links::orderby('link_order','asc')->paginate(3);

        return view('admin.links.index',compact('data'));
    }

    //创建
    public function create(){
        return view('admin/links/create');
    }

    //处理创建请求
    public function store(){

        $input= Input::except('_token');

        $links= Links::create($input);
        if ($links){
            echo '创建成功';
        }else{
            echo '创建失败';
        }
    }

    //编辑
    public function edit($id){
        $data= Links::find($id);
        return view('admin/links/edit',compact('data'));
    }

    //处理编辑请求
    public function update($id){
        $input= Input::except('_method','_token');
        $link= Links::find($id);
        if ($link){
            $res= Links::where('link_id',$id)->update($input);
            if ($res){
                echo '编辑成功';
            }else{
                echo '编辑失败';
            }
        }
    }

    //删除
    public function destroy($id){

        $link= Links::find($id);

        if ($link){
            $res= $link->delete();
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
