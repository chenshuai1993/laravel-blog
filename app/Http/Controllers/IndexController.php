<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    //
    public function index()
    {
        //数据
        $blogs = get_blog_more(0,1)['data'];

        return view('index.index',compact('blogs'));
    }

}
