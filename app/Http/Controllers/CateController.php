<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Blog;
use Illuminate\Http\Request;

class CateController extends Controller
{
    //
    public function show(Cate $cate)
    {
        //列表
        $blogs = get_blog_more($cate->id,1)['data'];

        return view('cate.show',compact('blogs','cate'));

    }
}
