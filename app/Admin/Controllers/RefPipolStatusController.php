<?php

namespace App\Admin\Controllers;

use App\Models\RefPipolStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefPipolStatusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefPipolStatus';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefPipolStatus());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('label', __('Label'));

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
        $show = new Show(RefPipolStatus::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('label', __('Label'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefPipolStatus());

        $form->text('name', __('Name'));
        $form->text('label', __('Label'));

        return $form;
    }
}
