@extends('layouts.app')
@section('title','首页')
@section('content')
    <div class="placeholder-height"></div>
    <div class="container" id="index">
        <div class="wrap-left pull-left">
            <div class="column-wrap">
                <span>{{$cate->name}}</span>
            </div>
            <div class="mod-info-flow">
                <!--博客列表-->
                {!! $blogs !!}
                <!--博客列表-->
            </div>

            <div class="get-mod-more js-get-mod-more-list transition" data-cur_page="1" data-catid="{{$cate->id}}">
                点击加载更多
            </div>
        </div>

        <div class="wrap-right pull-right">
            <!--公共右侧部分-->

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
@stop