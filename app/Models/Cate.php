<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Cate extends Model
{
    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
}
