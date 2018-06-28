<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class BlogTag extends Model
{
    protected $table = 'blog_tag';

    public $timestamps = false;

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
