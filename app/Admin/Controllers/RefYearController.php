<?php

namespace App\Admin\Controllers;

use App\Models\RefYear;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefYearController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefYear';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefYear());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));

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
        $show = new Show(RefYear::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefYear());

        $form->date('name', __('Name'))->default(date('Y-m-d'));

        return $form;
    }
}
