<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //分类列表
    public function index()
    {
        $data = Category::paginate(4);

        return view('admin.category.index')->with('data', $data) ;
    }

    //树形结构
    public function getTree($data)
    {
        $arr = array();
        foreach ($data as $k => $v) {
            if ($v->cate_pid == 0) {
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    if ($n->cate_pid == $v->cate_id) {
                        $data[$m]['_cate_name']= '╠-'. $data[$m]['cate_name'];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }


    //添加分类
    public function create()
    {

        $data = Category::where('cate_pid', 0)->get();

        return view('admin/category/create')->with('data',$data);
    }

    //处理添加分类请求
    public function store()
    {

        $input = Input::except('_token');

        $restult= Category::create($input);
        if ($restult){
            echo '增加分类成功';

        }else{
            echo '增加分类失败';
        }

    }


    //显示单个分类信息
    public function show()
    {

    }


    //编辑分类
    public function edit($id)
    {
        $cates= Category::find($id);
        $data= Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('cates','data'));
    }

    //更新分类
    public function update($id)
    {
        $input= Input::except('_token','_method');
        $cate= Category::find($id);

        $res= Category::where('cate_id',$id)->update($input);
        if ($res){
            echo '修改分类成功';
        }else{
            echo '修改失败';
        }


    }


    //删除单个分类
    public function destroy($id)
    {
        $cate= Category::find($id);
        if ($cate){
            $res= Category::where('cate_id',$id)->delete();
            if ($res==1){
                return response()->json([
                    'res' => '1',
                    'msg'=> '删除成功'
                ]);
            }

        }

    }

}
