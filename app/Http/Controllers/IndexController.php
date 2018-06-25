<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index.index');
    }

    public function article()
    {
        return view('index.article');
    }

    public function list()
    {
        return view('index.list');
    }


}
