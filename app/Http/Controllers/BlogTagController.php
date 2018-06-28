<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogTag;

class BlogTagController extends Controller
{
    //
    public function index()
    {
       $info =  BlogTag::all();
    }
}
