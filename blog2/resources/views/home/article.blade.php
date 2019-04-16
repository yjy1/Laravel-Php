@extends('layouts.home')
@section('content')
@section('info')
    <title>{{$article->art_title}}--{{\Illuminate\Support\Facades\Config::get('web.web_title')}}</title>
@endsection

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-g am-g-fixed blog-fixed">


        <div class="am-u-sm-12">
            <article class="am-article blog-article-p">
                <div class="am-article-hd">
                    <h1 class="am-article-title blog-text-center">{{$article->art_title}}</h1>
                    <p class="am-article-meta blog-text-center">
                        <span><a href="#" class="blog-color">{{$article->art_tag}} &nbsp;</a></span>-
                        <span><a href="#">@ {{$article->art_editor}} &nbsp;</a></span>-
                        <span><a href="#">{{date('Y-m-d H:i:s',$article->art_time)}}</a></span>
                        <span><a href="#">&nbsp;&nbsp;查看次数：{{$article->art_view}}</a></span>
                    </p>
                </div>
                <div class="am-article-bd">
                    <img style="
    width: 100%;height: 604px;
" src="{{$article->art_thumb}}" alt="" class="blog-entry-img blog-article-margin">

                    {!!$article->art_content!!}
                </div>
            </article>


            <hr>
            <div class="am-g blog-author blog-article-margin">
                <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
                    <img src="/home/assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
                </div>
                <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
                    <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">{{$article->art_editor}}</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                        ut
                        aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <hr>


            <ul class="am-pagination blog-article-margin">

                <li class="am-pagination-prev">
                    @if($article['pre'])
                        <a href="{{url('article/'.$article['pre']->art_id)}}" class="">&laquo;
                            上一篇 {{$article['pre']->art_title}} </a>
                    @else
                        没有上一篇了
                    @endif
                </li>

                <li class="am-pagination-next">
                    @if($article['next'])
                        <a href="{{url('article/'.$article['next']->art_id)}}">下一篇
                            {{$article['next']->art_title}} &raquo;</a>
                    @else
                        没有下一篇了
                    @endif
                </li>

            </ul>

        </div>
        <hr>
        <div class="am-u-md-4 am-u-sm-12 blog-sidebar"  >

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


        <form class="am-form am-g" method="post" action="{{url('/comm')}}">
            {{csrf_field()}}
            <input type="hidden" name="member_id" value="{{session('member.member_id')}}">
            <input type="hidden" name="article_id" value="{{$article->art_id}}">
            <h3 class="blog-comment">评论</h3>
            <fieldset  >
                <div class="am-form-group">
                    <textarea name="comm_content" rows="5" placeholder="一诺千金"></textarea>
                </div>
                <p>
                    <button type="submit" class="am-btn am-btn-default">发表评论</button>
                </p>
            </fieldset>
        </form>


        <div class="row" >
            <div class="col-sm-12 col-md-8">
                <div class="article-comment">
                    <div class="page-header"><b>相关评论</b></div>
                    <div class="clearfix"></div>
                    <div class="comment-list">
                        @foreach($comm as $c)
                            <hr><br>
                            <div class="comment-list-item">
                                <div class="info" style="color: dodgerblue;margin-bottom: 10px">
                                    #  {{$c->member_nickname}}
                                    <small style="color: black;margin-left: 55px;">{{date('Y-m-d H:i:s',$c->comm_time)}}</small>
                                </div>
                                <div class="content" >{{$c->comm_content}}</div>
                            </div>

                        @endforeach
                    </div>

                    <div>
                        {{$comm->links()}}
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- content end -->

@endsection
