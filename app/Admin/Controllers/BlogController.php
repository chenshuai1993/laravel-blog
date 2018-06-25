<?php

namespace App\Admin\Controllers;

use App\Models\Blog;

use App\Models\Cate;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Input;
use App\Models\Tag;

class BlogController extends Controller
{
    use ModelForm;

    protected $typeList =['1' => '原创', '2'=> '转载'];

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('文章列表');
            $content->description('');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('新增文章');
            $content->description('新增文章');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Blog::class, function (Grid $grid) {

            $grid->model()->orderBy('id', 'desc');


            $grid->id('ID')->sortable();
            $grid->title('标题');
            $grid->title('英文标题');
            $grid->cates()->name_en('栏目名称'); //belongs
            $grid->type('文章类型');
            $grid->readed_sum('阅读量');
            $grid->status('状态');
            $grid->created_at('创建时间');
            //$grid->tags('标签');

            $grid->tags()->display(function ($tag) {

                $tags = array_map(function ($tag) {
                    return "<span class='label label-success'>{$tag['name']}</span>";
                }, $tag);

                return join('&nbsp;', $tags);
            });


        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Blog::class, function (Form $form) {



            $form->display('id', 'ID');

            // 添加text类型的input框
            $form->text('title', '文章标题')->rules('required');
            //$form->text('content', '文章内容');
            //$form->editor('content','文章内容')->rules('required');//富文本编辑框

            $form->editor('content');

            $form->image('img','文章图片')->uniqueName();


            $form->select('cate_id', '文章栏目')->options(Cate::all()->pluck('name', 'id'))->rules('required');

            $form->radio('type', '原创/转载')->options($this->typeList)->default('1');
            $form->number('readed_sum','文章阅读量')->default(10);
            $form->select('operate','推荐位置')->options([1 => '置顶推荐', 2 => '栏目推荐', '3' => '右侧推荐'])->default('1');

            $form->multipleSelect('tags')->options(Tag::all()->pluck('name', 'id'));


            //保存前回调
            $form->saved(function (Form $form) {
                //当前博客id
                //$form->model()->tags()->attach(6);

            });

        });
    }


}
