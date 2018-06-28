<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Cate;
use App\Models\Tag;
use App\Models\BlogTag;
use App\Events\BlogInit;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function blogMore(Request $request)
    {
        $blogs = get_blog_more($request->input('cate_id'),$request->input('page'));

        return response()->json($blogs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //博客访问加一
        event( new BlogInit($blog));


        //热门文章
        $hotBlogs = Blog::select('id','desc','title','title_en','cate_id','type','readed_sum')
            ->where('status', 1)
            ->orderBy('readed_sum', 'desc')
            ->limit(5)
            ->get();

        //最近5个文章
        $latestBlogs = Blog::select('id','desc','title','title_en','cate_id','type','readed_sum')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->limit(5)
            ->get();

        return view('blog.show',compact('blog','hotBlogs','latestBlogs'));
    }

    public function tag(Tag $tag)
    {
        $blogs = get_tag_more($tag->id,1)['data'];

        return view('tag.show',compact('blogs','tag'));
    }

    public function tagMore(Request $request)
    {
        $blogs = get_tag_more($request->input('tag_id'),$request->input('page'));

        return response()->json($blogs);
    }




}
