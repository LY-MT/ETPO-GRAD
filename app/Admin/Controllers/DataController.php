<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Data;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class DataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Data(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('qq');
            $grid->column('name');
            $grid->column('subtitle');
            $grid->column('image');
            $grid->column('content');
            $grid->column('like');
            $grid->column('comment');
            $grid->column('ip');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Data(), function (Show $show) {
            $show->field('id');
            $show->field('qq');
            $show->field('name');
            $show->field('subtitle');
            $show->field('image');
            $show->field('content');
            $show->field('like');
            $show->field('comment');
            $show->field('ip');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Data(), function (Form $form) {
            $form->display('id');
            $form->text('qq');
            $form->text('name');
            $form->text('subtitle');
            $form->text('image');
            $form->text('content');
            $form->text('like');
            $form->text('comment');
            $form->text('ip');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
