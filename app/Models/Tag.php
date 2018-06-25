<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Tag extends Model
{

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
