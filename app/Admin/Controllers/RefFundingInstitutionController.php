<?php

namespace App\Admin\Controllers;

use App\Models\RefFundingInstitution;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RefFundingInstitutionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'RefFundingInstitution';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefFundingInstitution());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('slug', __('Slug'));
        $grid->column('ref_funding_source_id', __('Ref funding source id'));

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
        $show = new Show(RefFundingInstitution::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('slug', __('Slug'));
        $show->field('ref_funding_source_id', __('Ref funding source id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefFundingInstitution());

        $form->text('name', __('Name'));
        $form->text('description', __('Description'));
        $form->text('slug', __('Slug'));
        $form->number('ref_funding_source_id', __('Ref funding source id'));

        return $form;
    }
}
