<?php

namespace App\Admin\Controllers;

use App\Models\RefOperatingUnit;
use App\Models\RefOperatingUnitType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefOperatingUnitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Operating Unit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefOperatingUnit());

        $types = RefOperatingUnitType::all()->pluck('name','id');

        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('label', __('Label'));
        $grid->column('ref_operating_unit_type_id', __('Type'))
            ->using($types->toArray());
        $grid->column('logo', __('Logo'));

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
        $show = new Show(RefOperatingUnit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('label', __('Label'));
        $show->field('ref_operating_unit_type_id', __('Type'));
        $show->field('logo', __('Logo'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefOperatingUnit());

        $types = RefOperatingUnitType::all()->pluck('name','id');

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('label', __('Label'));
        $form->select('ref_operating_unit_type_id', __('Type'))
            ->options($types);
        $form->textarea('logo', __('Logo'));

        return $form;
    }
}
