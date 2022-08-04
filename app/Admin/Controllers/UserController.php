<?php

namespace App\Admin\Controllers;

use App\Models\Office;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $roles = Role::all()->pluck('name', 'id');
        $offices = Office::all()->pluck('acronym','id');

        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('username', __('Username'));
        $grid->column('position', __('Position'));
        $grid->column('email', __('Email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('office_id', __('Office'))
            ->using($offices->toArray());
        $grid->column('avatar', __('Avatar'))
            ->display(function () {
                return '<img height="40" class="img-circle" src="'. $this->avatar .'" alt="'. $this->first_name .'">';
            });
        $grid->column('activated_at', __('Activated at'))
            ->display(function () {
                return optional($this->activated_at)->diffForHumans(null, null, true);
            });
        $grid->column('password_changed_at', __('Password changed at'))
            ->display(function () {
                return optional($this->password_changed_at)->diffForHumans(null, null, true);
            });
        $grid->column('is_admin', __('Is admin'))
            ->bool();
        $grid->column('role_id', __('Role'))
            ->using($roles->toArray());

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('two_factor_secret', __('Two factor secret'));
        $show->field('two_factor_recovery_codes', __('Two factor recovery codes'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('office_id', __('Office id'));
        $show->field('avatar', __('Avatar'));
        $show->field('google_id', __('Google id'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('activated_at', __('Activated at'));
        $show->field('password_changed_at', __('Password changed at'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('is_admin', __('Is admin'));
        $show->field('role_id', __('Role id'));
        $show->field('username', __('Username'));
        $show->field('position', __('Position'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('position', __('Position'));
        $form->email('email', __('Email'));
        $form->text('username', __('Username'));
        $form->select('office_id', __('Office'))
            ->options(Office::all()->pluck('name','id'));
        $form->switch('is_admin', __('Is admin'));
        $form->select('role_id', __('Role'))
            ->options(Role::all()->pluck('name','id'));

        return $form;
    }
}
