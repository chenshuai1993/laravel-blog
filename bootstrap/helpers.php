<?php

use App\Models\Cate;
use App\Models\Blog;
use App\Models\BlogTag;
use Illuminate\Support\Facades\DB;


if(! function_exists('route_class')){
    function route_class()
    {
        return str_replace('.', '-', Route::currentRouteName());
    }
}

if(! function_exists('web_navs') ){
    function web_navs(){

        //导航
        $catesObj = Cate::select('id','name','nav_id')->where('status','1')->orderBy('sort','desc')->get();
        $catesArr = $catesObj->toArray();

        $nav_name_list = [];
        foreach ($catesObj as $key => $value){
            $nav_name_list[$value->nav->id] = $value->nav->name;
        }

        $nav_list = [];
        foreach ($catesArr as $key => $value){
            $nav_list[$value['nav_id']]['cates'][] = $value;
            $nav_list[$value['nav_id']]['nav_name'] = $nav_name_list[$value['nav_id']];
            $nav_list[$value['nav_id']]['cate_id'] = $value['id'];
        }

        return $nav_list;
    }
}

if(! function_exists('get_blog_more') ){

    function get_blog_more($cate_id,$page){

        $result = [
            'status'=>1,
            'data'=>[],
        ];

        //数据
        $where = [
            ['status', '=', '1'],
        ];

        if($cate_id){
            $where[] = ['cate_id', '=', $cate_id];
        }

        $blogs =  Blog::select('id','desc','title','title_en','cate_id','type','readed_sum','created_at')
            ->where($where)
            ->orderBy('id', 'desc')
            ->offset(($page-1)*5)
            ->limit(10)
            ->get();

        $blogCount = $blogs->toArray();
        if(empty($blogCount)){
            $result = [
                'status'=>0,
                'data'=>'',
            ];
        }else{
            $result['data'] = carete_blog_html($blogs);
        }

        return $result;



    }

}

if(! function_exists('get_tag_more') ){

    function get_tag_more($tag_id,$page){

        $result = [
            'status'=>1,
            'data'=>[],
        ];


        //查询blog_tag
        $blog_ids = BlogTag::select('blog_id')
            ->where('tag_id',$tag_id)
            ->orderBy('id','desc')
            ->offset(($page-1)*5)
            ->limit(10)
            ->get()
            ->pluck('blog_id')
            ->toArray();

        //查新blog
        $blogs = Blog::select('id','desc','title','title_en','cate_id','type','readed_sum','created_at')->whereIn('id',$blog_ids)->get();

        $blogCount = $blogs->toArray();
        if(empty($blogCount)){
            $result = [
                'status'=>0,
                'data'=>'',
            ];
        }else{
            $result['data'] = carete_blog_html($blogs);
        }

        return $result;

    }

}

if(! function_exists('get_tags')){

    function get_tags(){
        return BlogTag::select('tag_id',DB::raw('count(tag_id) as count'))->groupBy('tag_id')->orderBy('count','desc')->limit(15)->get();
    }

}

if(! function_exists('carete_blog_html')){

    function carete_blog_html($blogs){
        $data='';

        foreach ($blogs as $key => $blog){
            $data .="<div class='mod-b mod-art' data-aid='{$blog->id}'>".PHP_EOL;
            $data .="<div class='mod-angle'>热</div>".PHP_EOL;

            $data .="<div class='mod-thumb'>".PHP_EOL;
            $data .="<a class='transition' title='{$blog->title}' href='".route('blog.show',[$blog->id,$blog->title_en])."' target='_blank'>".PHP_EOL;
            $data .="<img class='lazy' src='/sy-img/111527830443.jpg' alt='{$blog->title}' >".PHP_EOL;
            $data  .="</a>".PHP_EOL;;
            $data .='</div>'.PHP_EOL;

            $data .="<div class='column-link-box'>".PHP_EOL;
            foreach ($blog->tags as $tag){
                $data .="<a class='transition' title='{$blog->title}' href='".route('tag.show',[$tag->id,$tag->name])."' target='_blank'>{$tag->name}</a>".PHP_EOL;
            }
            $data .='</div>'.PHP_EOL;

            $data .='<div class="mob-ctt">'.PHP_EOL;
            $data .="<h2><a href='". route('blog.show',[$blog->id,$blog->title_en]). "' class='transition msubstr-row2' target='_blank'>{$blog->title}</a></h2>".PHP_EOL;

            $data .='<div class="mob-author">'.PHP_EOL;
            $data .='<div class="author-face">'.PHP_EOL;
            $data .='<a href="#" target="_blank"><img src="/sy-img/59_1502432173.jpg"></a>'.PHP_EOL;
            $data .='</div>'.PHP_EOL;
            $data .='<a href="javascript:;" target="_blank">'.PHP_EOL;
            $data .="<span class='author-name'>{$blog->cates->name}</span>".PHP_EOL;
            $data .='</a>'.PHP_EOL;

            $data .=" <span class=\"time\">{$blog->created_at->diffForHumans()}</span>".PHP_EOL;
            $data .="<i class=\"icon icon-fvr\"></i><em>{$blog->readed_sum}</em>".PHP_EOL;
            $data .='</div>'.PHP_EOL;
            $data .= "<div class=\"mob-sub\">{$blog->desc}</div>".PHP_EOL;
            $data .='</div>'.PHP_EOL;
            $data .='</div>'.PHP_EOL;
        }

        return $data;
    }

}

if(! function_exists('recommend')){

    function recommends($cate_id=0){
        $where[] = ['operate','=','1'];
        $where[] = ['status','=','1'];
        $cate_id ? $where[] = ['cate_id','=',$cate_id] :'';

        return Blog::select('id','title','title_en','created_at')
            ->where($where)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
    }
}



