@extends('layouts.app')
@section('title','首页')
@section('content')

    <div class="placeholder-height"></div>
    <div class="container" id="index">
        <div class="wrap-left pull-left">
            <div class="big-pic-box">
                <div class="big-pic">
                    <a href="javascript:;" target="_blank" class="transition" title="醒醒吧，腾讯、网易称霸的游戏行业，谁都没机会成为第三">
                        <div class="back-img"><img src="/sy-img/061708387437.jpg"  alt="醒醒吧，腾讯、网易称霸的游戏行业，谁都没机会成为第三"></div>
                        <div class="big-pic-content">
                            <h1 class="t-h1">醒醒吧，腾讯、网易称霸的游戏行业，谁都没机会成为第三</h1>
                        </div>
                    </a>
                </div>
                <div class="big2-pic big2-pic-index big2-pic-index-top">
                    <a href="javascript:;" class="back-img transition" target="_blank" title="嘘！Facebook 正在上海悄悄寻找办公室">
                        <img class="lazy" src="/sy-img/142618969973.jpg" alt="嘘！Facebook 正在上海悄悄寻找办公室">
                    </a>
                    <a href="javascript:;" target="_blank" title="嘘！Facebook 正在上海悄悄寻找办公室">
                        <div class="big2-pic-content">
                            <h2 class="t-h1">嘘！Facebook 正在上海悄悄寻找办公室</h2>
                        </div>
                    </a>
                </div>
                <div class="big2-pic big2-pic-index big2-pic-index-bottom">
                    <a href="javascript:;" class="back-img transition" target="_blank" title="马云在人生最艰难时去了延安，在革命根据地决定建立淘宝">
                        <img class="lazy" src="/sy-img/093433055013.jpg" alt="马云在人生最艰难时去了延安，在革命根据地决定建立淘宝">
                    </a>
                    <a href="javascript:;" target="_blank">
                        <div class="big2-pic-content">
                            <h2 class="t-h1">马云在人生最艰难时去了延安，在革命根据地决定建立淘宝</h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mod-info-flow">
                <!--博客列表-->
                {!! $blogs !!}
                <!--博客列表-->
            </div>

            <div class="get-mod-more js-get-mod-more-list transition" data-cur_page="1" data-catid="0">
                点击加载更多
            </div>
        </div>

        <!--右边-->
        <div class="wrap-right pull-right">

            <!--传言部分开始-->
            <div class="box-moder moder-rumors-list">
                <h3>传言</h3>
                <span class="span-mark"></span>
                <div class="big2-pic pull-right">
                    <a href="javascript:;" class="back-img" target="_blank">
                        <img class="lazy" src="/sy-img/105108838520.jpg" alt="">
                    </a>
                    <a href="javascript:;" target="_blank">
                        <div class="big2-pic-content">
                            <h2 class="t-h1">你好吗，少年</h2>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div>
                <div class="clear"></div>
                <ul class="rumorlist">
                    <li>
                        <div class="icon-clock"><img src="/images/clock.jpg"/></div>
                        <p class="rumor-time">08:00</p>
                        <p class="rumor-detail"><a href="javascript:;" target="_blank">PHP是最好的语言</a></p>
                    </li>
                </ul>
                <div class="rumor-brunt-box">
                    <a class="btn btn-blue-cy js-update-cy transition js-show-bruntback-box1" >编程改变世界 :)</a>
                </div>
            </div>
            <div class="placeholder"></div>
            <!--传言部分结束-->

            <!--推荐阅读-->
            @include('public.recommend')
            <!--推荐阅读-->

            <!--ad-->
            @include('public.ad')
            <!--ad-->

            <!--热门标签-->
            @include('public.hot_tag')
            <!--热门标签-->

            <!--收藏和业界大佬-->
            @include('public.bosses')
            <!--收藏和业界大佬-->

            <!--友情链接-->
            @include('public.links')
            <!--友情链接-->

            <!--赞助-->
            @include('public.sponsors')
            <!--赞助-->

            <!--鸡汤-->
            @include('public.chicken-soup')
            <!--鸡汤-->


        </div>


    </div>
@stop