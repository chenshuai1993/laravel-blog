<?php

namespace App\Admin\Controllers;

use App\Models\Cate;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CateController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('栏目');
            $content->description('列表');

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

            $content->header('栏目');
            $content->description('编辑');

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

            $content->header('栏目');
            $content->description('新增');

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
        return Admin::grid(Cate::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name('名称(zh)');
            $grid->name_en('名称(en)');
            $grid->count('文章总数');
            $grid->status('状态');
            $grid->created_at('创建时间');
            //$grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Cate::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('name','名称(zh)')->rules('required');
            $form->text('name_en','名称(en)')->rules('required');
            $form->number('sort','排序')->default('1');
            $form->number('count','文章总数')->default('0');
            $form->select('status','导航条')->options([1=>'可见',2=>'不可见'])->default('1');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
