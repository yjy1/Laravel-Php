<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\CommonController;
use App\Http\Model\Article;
use App\Http\Model\Comm;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Compound;

class IndexController extends CommonController
{

    public function index()
    {
        $hot = Article::orderby('art_view', 'desc')->take(6)->get();
        $main_art = Article::orderby('art_time', 'desc')->paginate(5);
        $new = Article::orderby('art_time', 'desc')->take(8)->get();
        return view('home/index', compact('hot', 'main_art', 'new'));
    }

    public function cate()
    {
        return view('home/cate');
    }

    public function article($id)
    {
        if ($article = Article::find($id)) {

            $article['pre'] = Article::where('art_id', '<', $id)->orderBy('art_id', 'desc')->first();
            $article['next'] = Article::where('art_id','>',$id)->orderBy('art_id','asc')->first();
            $comm = DB::table('member')
                ->join('comm', 'member.member_id', '=', 'comm.member_id')
                ->join('article','article.art_id','=','comm.article_id')
                ->where('article.art_id','=',$id)
                ->orderby('comm.comm_time','desc')
                ->select('member.member_nickname','member.member_pic', 'comm.comm_content','comm.comm_time')
                ->paginate('4');
            View::share('comm',$comm);
            return view('home/article', compact('article', $article));

        } else {
            echo '无此文章';
        }
    }

    //评论
    public function comm()
    {
        $input = Input::except('_token');
        $input['comm_time']= time();
        $res = Comm::create($input);
        if ($res){
            echo "<script>alert('评论成功！');window.history.go(-1);window.location.reload() </script>";
        }
    }


    //退出
    public function logout(){
        session(['member'=>null]);
        return redirect('/');
    }

    //发布
    public function push(){
        if ($input= Input::except('_token')){

            //处理图片
            $f = $input['source'];
            if ($f->isValid()){
                $ext= $f->getClientOriginalExtension();
                $realpath= $f->getRealPath();
                $filename= date('Y-m-d-H-i-m').'.'.$ext;
                $res= Storage::disk('public')->put($filename,file_get_contents($realpath));
                if ($res){
                    //存储文件路径
                    $input['art_thumb']= '../storage/'.$filename;

                }
            }

            //如果没上传图片动作，执行以下
            //存储除图片外的字段
            $input['art_time']= time();

            $res2= Article::create($input);
            if ($res2){
                echo "<script>alert('发布成功！');location.href= '/'</script>";
            }else{
                echo '出现错误';
            }
        }
        $nav= Navs::all();
        return view('home/articleCreate',compact('nav',$nav));
    }


    //导航列表
    public function nav($id){

        $navlist= DB::table('navs')
            ->join('article','article.nav_id','=','navs.nav_id')
            ->where('navs.nav_id','=',$id)
            ->orderby('article.art_time','desc')
            ->select('navs.nav_id','navs.nav_name','article.*')
            ->paginate(5);
        if ($navlist){
            return view('home/nav',compact('navlist',$navlist));
        }else{
            echo "<script>alert('此导航下无文章');location.href= window.history.back()</script>";
        }
    }
}
