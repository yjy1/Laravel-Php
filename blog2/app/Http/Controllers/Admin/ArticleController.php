<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Location;

class ArticleController extends Controller
{
    //文章列表
    public function index()
    {

        $articles = Article::orderby('art_time', 'desc')->paginate(3);
        return view('admin.article.index', compact('articles'));
    }


    //添加文章
    public function create()
    {

        return view('admin/article/create');
    }



    //处理添加文章请求
    public function store()
    {
        $input = Input::except('_token', 'file');
        $input['art_time'] = time();
        $fileCharater =  $input['source'];
        if ($fileCharater->isValid()) {
            $ext = $fileCharater->getClientOriginalExtension();
            $path = $fileCharater->getRealPath();
            $filename = date('Y-m-d-h-i-s') . '.' . $ext;

            $imgRes= Storage::disk('public')->put($filename, file_get_contents($path));
            if ($imgRes){
                $input['art_thumb']= '../storage/'.$filename;
            }else{
                echo '图片上传失败';
            }
        }

        $restult = Article::create($input);

        if ($restult) {
            echo '增加成功';

        } else {
            echo '增加失败';
        }
    }


    //编辑文章
    public function edit($id)
    {

        $articles = Article::find($id);
        return view('admin.article.edit', compact('articles'));
    }

    //处理编辑文章请求
    public function update($id)
    {
        $input = Input::except('_token','file','_method');
        $fileCharater =  $input['source'];
        if ($fileCharater->isValid()) {
            $ext = $fileCharater->getClientOriginalExtension();
            $path = $fileCharater->getRealPath();
            $filename = date('Y-m-d-h-i-s') . '.' . $ext;
            $imgRes= Storage::disk('public')->put($filename, file_get_contents($path));
            if ($imgRes){
                $input['art_thumb']= '../storage/'.$filename;
            }else{
                echo '图片上传失败';
            }
        }
        $article = Article::find($id);
        $a= array_except($input,'source');
        $res = Article::where('art_id', $id)->update($a);
        if ($res) {
            echo '修改成功';
        } else {
            echo '修改失败';
        }

    }


    //删除单篇文章
    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article) {
            $res = Article::where('art_id', $id)->delete();
            if ($res == 1) {
                return response()->json([
                    'res' => '1',
                    'msg' => '删除成功'
                ]);
            }

        }

    }
}
