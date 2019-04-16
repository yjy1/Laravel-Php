<?php

namespace App\Http\Controllers;

use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class CommonController extends Controller
{
     public function __construct()
     {
         $data= Navs::all();
         $link= Links::orderby('link_order','asc')->get();

         $hot = Article::orderby('art_view', 'desc')->take(6)->get();
         $new = Article::orderby('art_time', 'desc')->take(8)->get();


         View::share('data',$data);
         View::share('link',$link);
         View::share('hot',$hot);
         View::share('new',$new);

     }
}
