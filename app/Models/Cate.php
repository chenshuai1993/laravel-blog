<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\Nav;

class Cate extends Model
{
    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }

    //多对一
    public function nav()
    {
        return $this->belongsTo(Nav::class);
    }
}
