<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cate;

class Nav extends Model
{

    public function cates()
    {
        return $this->hasMany(Cate::class);
    }

    public function getWebNavs()
    {
        $cates = Cate::where('status','1')->get();

        foreach ($cates as $cate) {
            print_r($cate->nav->name);die;
        }
    }

}
