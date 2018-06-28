<!--推荐阅读-->
<div class="box-moder hot-tag">
    <h3>推荐阅读</h3>
    <span class="span-mark"></span>
    <div class="zt-article">
        <div class="zt-article-img">
            <a href="https://www.huxiu.com/special/3158.html" target="_blank" title="Pick“101女孩”">
                <img src="https://img.huxiucdn.com/special/201806/24/100411379654.jpg">
            </a>
        </div>
        <ul>
            @foreach(recommends() as $blog)
            <li>
                <a href="{{route('blog.show',[$blog->id,$blog->title_en])}}">
                    <span class="title"> # {{$blog->title}} #</span>
                    <span class="time pull-right">{{$blog->created_ed}}</span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="placeholder"></div>
<!--推荐阅读-->