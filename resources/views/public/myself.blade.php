<!--个人介绍-->
<div class="box-author-info">
    <div class="author-face">
        <a href="javascript:;" target="_blank"><img src="/images/logo.jpg"></a>
    </div>
    <div class="author-name">
        <a href="javascript:;" target="_blank">陈帅</a>
        <a href="javascript:;" target="_blank"><i class="i-vip icon-vip" title="陈帅同学网站究极会员"></i></a>
        <i class="i-icon icon-auth3" title="陈帅同学作者"></i>
    </div>
    <div class="author-one">程序员</div>
    <div class="author-one">程序改变世界</div>
    <div class="author-article-pl">
        <ul>
            <li><a href="javascript:;" target="_blank">100+篇文章</a></li>
        </ul>
    </div>

    <div class="author-next-article">
        <div class="author-one c2">最近文章</div>

        <ul>
            @foreach($latestBlogs as $blog)
                <li>
                    <a href="{{route('blog.show',[$blog->id,$blog->title_en])}}" target="_blank">{{$blog->title}}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="placeholder"></div>
<!--个人介绍-->