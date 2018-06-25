<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

/*CREATE TABLE `blog` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL COMMENT '标题',
`title_en` varchar(255) DEFAULT NULL COMMENT '英文title',
`desc` varchar(255) DEFAULT NULL COMMENT '简介',
`content` longtext NOT NULL COMMENT '内容',
`img` varchar(255) NOT NULL COMMENT '标题图片',
`cateid` int(11) NOT NULL COMMENT '栏目id',
`type` tinyint(1) NOT NULL COMMENT '类型(原创,转载)',
`readed_sum` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
`is_comment` tinyint(4) DEFAULT NULL COMMENT '是否允许评论',
`comment_sum` int(11) NOT NULL DEFAULT '0' COMMENT '评论总数',
`operate` tinyint(4) DEFAULT NULL COMMENT '操作（是否置顶,栏目推荐,热点排行）',
`time` date DEFAULT NULL COMMENT '操作时间',
`static` tinyint(4) DEFAULT '0' COMMENT '状态 0:未审核  1:已经审核  2:软删除  ',
`tags` varchar(255) NOT NULL COMMENT '标签',
PRIMARY KEY (`id`),
KEY `cateid` (`cateid`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8*/

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','255')->comment('文章标题');
            $table->string('title_en','255')->comment('文章标题');
            $table->string('desc','255')->comment('文章简介')->nullable();
            $table->longText('content')->comment('文章内容');
            $table->string('img','50')->comment('文章图片地址')->nullable();
            $table->integer('cate_id')->comment('文章栏目');
            $table->tinyInteger('type')->default('1')->comment('文章类型 1.原创 2.转载');
            $table->integer('readed_sum')->comment('文章阅读量');
            $table->integer('operate')->default('1')->comment('文章推荐位 1.首页推荐,2.栏目推荐,3.热点排行');
            $table->integer('status')->default('0')->comment('文章状态 0:未审核  1:已经审核  2:软删除');
            $table->string('tags')->comment('标签')->nullable();
            $table->timestamps();
            $table->index('cate_id');
            $table->index('operate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
