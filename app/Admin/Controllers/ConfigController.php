<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Config;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ConfigController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Config(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('more');
            $grid->column('more_title');
            $grid->column('more_subtitle');
            $grid->column('more_image');
            $grid->column('more_content');
            $grid->column('music_type');
            $grid->column('music_server');
            $grid->column('music_id');
            $grid->column('music_autoplay');
            $grid->column('music_order');
            $grid->column('music_volume');
            $grid->column('footer');
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
        return Show::make($id, new Config(), function (Show $show) {
            $show->field('id');
            $show->field('more');
            $show->field('more_title');
            $show->field('more_subtitle');
            $show->field('more_image');
            $show->field('more_content');
            $show->field('music_type');
            $show->field('music_server');
            $show->field('music_id');
            $show->field('music_autoplay');
            $show->field('music_order');
            $show->field('music_volume');
            $show->field('footer');
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
        return Form::make(new Config(), function (Form $form) {
            $form->display('id');
            $form->text('more');
            $form->text('more_title');
            $form->text('more_subtitle');
            $form->text('more_image');
            $form->text('more_content');
            $form->text('music_type');
            $form->text('music_server');
            $form->text('music_id');
            $form->text('music_autoplay');
            $form->text('music_order');
            $form->text('music_volume');
            $form->text('footer');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
