<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cate;
use App\Models\Tag;
use App\Models\BlogTag;

class Blog extends Model
{
    //
    public $typeList =['1' => '原创', '2'=> '转载'];

    public function getTypeAttribute($type)
    {
        return $this->typeList[$type];
    }


    public function cates()
    {
        return $this->belongsTo(Cate::class,'cate_id','id');
    }



    /**
     * 获得此文章的所有标签。
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


}
