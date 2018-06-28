@extends('layouts.app')
@section('title','title')
@section('content')
    <div class="placeholder-height"></div>
    <div class="article-section-wrap">
        <div class="article-section" data-aid="197460">
            <div class="container" id="article197460">
                <div class="nrtj-wrap" id="nrtj-wrap197460"></div>
                <div class="wrap-left pull-left">
                    <!--文章内容页-->
                    <div class="article-wrap">
                        <h1 class="t-h1"> {{ $blog->title }}</h1>
                        <div class="article-author">
                            <div class="column-link-box">
                                <span class="article-time pull-left">{{ $blog->created_at->diffForHumans() }}</span>
                                <span class="article-pl pull-left">热度{{ $blog->readed_sum }}</span>
                                <a href="{{ route('cate.show',[$blog->cates->id,$blog->cates->name]) }}" class="column-link" target="_blank">{{ $blog->cates->name }}</a> <i></i>
                            </div>
                        </div>
                        <!--管理员按钮-->
                        <div class="article-manage-bar" id="article-manage-bar-{{$blog->id}}"></div>
                        <!--文章头图-->
                        <div class="article-img-box"><img src="https://img.huxiucdn.com/article/cover/201705/30/163018709897.jpg?imageView2/1/w/800/h/600/|imageMogr2/strip/interlace/1/quality/85/format/jpg" alt="闪送、小罐茶：将单一元素推向极致的创业给我们什么启发？"></div>
                        <div id="article_content{{ $blog->id }}" class="article-content-wrap">

                            {!! $blog->content !!}

                            <!--作者认证-->
                            <div class="neirong-shouquan">
                                <span class="c2">*文章为作者原创或网络转载<br></span>
                                <span>转载此文请于文首标明作者姓名，保持文章完整性，并请附上出处</span>
                                <br />
                                <span><b>未按照规范转载者，陈帅同学保留追究相应责任的权利</b></span>
                            </div>
                            <div class="neirong-shouquan-public">
                                <span><b>编程改变世界</b></span>
                            </div>
                        </div>
                        <!--管理员底部按钮-->
                        <div class="tag-box ">
                            <ul class="transition">
                                @foreach ($blog->tags as $tag)
                                     <a href="{{route('tag.show',[$tag->id,$tag->name])}}" target="_blank"><li class="transition">{{$tag->name}}</li></a>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="wrap-right pull-right">

                    <!--个人介绍-->
                    @include('public.myself')
                    <!--个人介绍-->

                    <!--专栏-->
                    @include('public.column')
                    <!--专栏-->

                    <!--推荐阅读-->
                    @include('public.recommend')
                    <!--推荐阅读-->

                    <!--收藏和业界大佬-->
                    @include('public.bosses')
                    <!--收藏和业界大佬-->

                    <!--鸡汤-->
                    @include('public.chicken-soup')
                    <!--鸡汤-->
                </div>
            </div>
        </div>
        <div class="article-section article-section-last"></div>
    </div>
@stop