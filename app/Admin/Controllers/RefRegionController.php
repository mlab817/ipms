<?php

namespace App\Admin\Controllers;

use App\Models\RefRegion;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefRegionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefRegion';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefRegion());

        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('label', __('Label'));
        $grid->column('order', __('Order'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(RefRegion::findOrFail($id));

        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('label', __('Label'));
        $show->field('order', __('Order'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefRegion());

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('label', __('Label'));
        $form->number('order', __('Order'));

        return $form;
    }
}
