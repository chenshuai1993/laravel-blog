<!--热门标签-->
<div class="box-moder hot-tag">
    <h3>热门标签</h3>
   {{-- <span class="pull-right project-more"><a href="#" class="transition" target="_blank">全部</a></span>--}}
    <span class="span-mark"></span>
    <div class="search-history search-hot">
        <ul>

            @foreach(get_tags() as $tag)
                <li class="transition"><a href="{{route('tag.show',[$tag->tag->id,$tag->tag->name])}}" target="_blank">{{$tag->tag->name}}</a></li>
            @endforeach

        </ul>
    </div>
</div>
<div class="placeholder"></div>
<!--热门标签-->