<header id="top" role="banner" class="transition">
    <div class="container">
        <div class="navbar-header transition">
           {{-- <a href="/" title="首页"><img src="/images/logo.jpg" alt="陈帅同学" title="首页" /></a>--}}
            <a href="/" title="首页"><img src="/images/logo.png" alt="陈帅同学" title="首页" /></a>
        </div>
        <ul class="nav navbar-nav navbar-left" id="jsddm">
            @foreach(web_navs() as $key => $nav)
                    @if(count($nav['cates']) > 1)
                        <li class="nav-news js-show-menu">
                            <a href="/">{{$nav['nav_name']}}<span class="caret"></span></a>
                            <ul>
                            @foreach($nav['cates'] as $nav_cate)
                                <li><a href="{{ route('cate.show',[$nav_cate['id'],$nav_cate['name']])  }}" target="_blank">{{$nav_cate['name']}}</a></li>
                            @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="nav-news"><a href="{{ route('cate.show',[$nav['cate_id'],$nav['nav_name']]) }}" target="_blank">{{$nav['nav_name']}}<em class="nums-prompt"></em></a></li>
                    @endif

            @endforeach
             <style>
                #jsddm ul{position: absolute; visibility: hidden; background:#fff; width:250px;  top:60px; left:-50px; z-index:9999; box-shadow:0 1px 15px rgba(18,21,21,.2);padding:10px 5px;}
                #jsddm ul li{ float:left; width:105px; padding-left:20px; line-height:40px;}
            </style>

        </ul>
    </div>
</header>