<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('中文名称');
            $table->string('name_en')->comment('英文名称');
            $table->integer('sort')->default('1')->comment('排序');
            $table->integer('count')->comment('栏目文章总数');
            $table->tinyInteger('status')->default('1')->comment('栏目状态 1 导航可见  2导航不可见');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cates');
    }
}
