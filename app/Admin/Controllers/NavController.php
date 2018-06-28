<?php

namespace App\Admin\Controllers;

use App\Models\Cate;
use App\Models\Nav;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class NavController extends Controller
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

            $content->header('导航');
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

            $content->header('导航');
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

            $content->header('导航');
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
        return Admin::grid(Nav::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->name('名称');
            $grid->sort('排序');
            $grid->cates('栏目s')->display(function ($cate) {

                $cates = array_map(function ($cate) {
                    return "<span class='label label-success'>{$cate['name']}</span>";
                }, $cate);

                return join('&nbsp;', $cates);
            });
            $grid->created_at();
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
        return Admin::form(Nav::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '名称')->rules('required');
            $form->number('sort','排序')->default('1');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
