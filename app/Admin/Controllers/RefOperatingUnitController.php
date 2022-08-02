<?php

namespace App\Admin\Controllers;

use App\Models\RefOperatingUnit;
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
    protected $title = 'RefOperatingUnit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefOperatingUnit());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('label', __('Label'));
        $grid->column('operating_unit_type', __('Type'))
            ->display(function() {
                return $this->operating_unit_type->name ?? '';
            });
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
        $show->field('ref_operating_unit_type_id', __('Ref operating unit type id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('deleted_at', __('Deleted at'));
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

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('label', __('Label'));
        $form->number('ref_operating_unit_type_id', __('Ref operating unit type id'));
        $form->textarea('logo', __('Logo'));

        return $form;
    }
}
