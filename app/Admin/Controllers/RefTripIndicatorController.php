<?php

namespace App\Admin\Controllers;

use App\Models\RefTripIndicator;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefTripIndicatorController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefTripIndicator';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefTripIndicator());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('ref_infrastructure_sector_id', __('Ref infrastructure sector id'));

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
        $show = new Show(RefTripIndicator::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('ref_infrastructure_sector_id', __('Ref infrastructure sector id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefTripIndicator());

        $form->text('name', __('Name'));
        $form->number('ref_infrastructure_sector_id', __('Ref infrastructure sector id'));

        return $form;
    }
}
