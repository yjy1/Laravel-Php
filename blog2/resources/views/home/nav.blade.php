@extends('layouts.home')
@section('info')

    <title>{{\Illuminate\Support\Facades\Config::get('web.web_title')}}--{{\Illuminate\Support\Facades\Config::get('web.seo_title')}}</title>

@endsection
@section('content')

    <!-- nav end -->
    <!-- banner start -->
    <div class="am-g am-g-fixed blog-fixed am-u-sm-centered blog-article-margin">
        <div data-am-widget="slider" class="am-slider am-slider-b1" data-am-slider='{&quot;controlNav&quot;:false}'>
            <ul class="am-slides">
                <li>
                    <img src="/home/assets/i/b1.jpg">
                    <div class="blog-slider-desc am-slider-desc ">
                        <div class="blog-text-center blog-slider-con">
                            <span><a href="" class="blog-color">Article &nbsp;</a></span>
                            <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                            <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                            </p>
                            <span class="blog-bor">2015/10/9</span>
                            <br><br><br><br><br><br><br>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="/home/assets/i/b2.jpg">
                    <div class="am-slider-desc blog-slider-desc">
                        <div class="blog-text-center blog-slider-con">
                            <span><a href="" class="blog-color">Article &nbsp;</a></span>
                            <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                            <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                            </p>
                            <span>2015/10/9</span>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="/home/assets/i/b3.jpg">
                    <div class="am-slider-desc blog-slider-desc">
                        <div class="blog-text-center blog-slider-con">
                            <span><a href="" class="blog-color">Article &nbsp;</a></span>
                            <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                            <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                            </p>
                            <span>2015/10/9</span>
                        </div>
                    </div>
                </li>
                <li>
                    <img src="/home/assets/i/b2.jpg">
                    <div class="am-slider-desc blog-slider-desc">
                        <div class="blog-text-center blog-slider-con">
                            <span><a href="" class="blog-color">Article &nbsp;</a></span>
                            <h1 class="blog-h-margin"><a href="">总在思考一句积极的话</a></h1>
                            <p>那时候刚好下着雨，柏油路面湿冷冷的，还闪烁着青、黄、红颜色的灯火。
                            </p>
                            <span>2015/10/9</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- banner end -->

    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed">
        <div class="am-u-md-8 am-u-sm-12">

            @foreach($navlist as $n)
                <article class="am-g blog-entry-article">
                    <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                        <a href="{{url('article/'.$n->art_id)}}"><img src="../{{$n->art_thumb}}" alt="" class="am-u-sm-12"></a>
                    </div>
                    <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                        <span><a href="" class="blog-color">{{$n->art_tag}}&nbsp;</a></span>
                        <span> By {{$n->art_editor}} &nbsp;</span>
                        <span>{{date('Y-m-d H:i:s',$n->art_time)}}</span>
                        <h1><a href="{{url('article/'.$n->art_id)}}">{{$n->art_title}}</a></h1>
                        <p>
                            {{$n->art_desc}}
                        </p>
                        <p><a href="" class="blog-continue">continue reading</a></p>
                    </div>
                </article>
            @endforeach
            <div>
                {{$navlist->links()}}
            </div>

        </div>


        <div class="am-u-md-4 am-u-sm-12 blog-sidebar">
            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
                <img src="/home/assets/i/f12.jpg" alt="about me" class="blog-entry-img">
                <p>妹纸</p>
                <p>
                    我是妹子UI，中国首个开源 HTML5 跨屏前端框架
                </p>
                <p>我不想成为一个庸俗的人。十年百年后，当我们死去，质疑我们的人同样死去，后人看到的是裹足不前、原地打转的你，还是一直奔跑、走到远方的我？</p>
            </div>

            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-title"><span>最新文章</span></h2>
                <ul class="am-list">
                    @foreach($new as $new)
                        <li><a href="{{url('article/'.$new->art_id)}}">{{$new->art_title}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="blog-sidebar-widget blog-bor">
                <h2 class="blog-title"><span>点击排行</span></h2>
                <ul class="am-list">
                    @foreach($hot as $h)
                        <li><a href="{{url('article/'.$h->art_id)}}">{{$h->art_title}}</a></li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <!-- content end -->

@endsection