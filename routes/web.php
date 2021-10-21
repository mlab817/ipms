<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'login');

// Resources secured by auth
Route::middleware(['auth','password.changed'])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

//    Route::post('/logout_other_devices', \App\Http\Controllers\Auth\LogoutOtherDevicesController::class)->name('logout_other_devices');
//    Route::post('/change_password', \App\Http\Controllers\Auth\ChangePasswordController::class)->name('change_password');
    Route::post('/auth/password/change', \App\Http\Controllers\Auth\ChangePasswordController::class)->name('password.change');
    Route::get('/settings',\App\Http\Controllers\SettingsController::class)->name('settings');

    // other index routes
    Route::get('/projects/assigned', [\App\Http\Controllers\ProjectController::class,'assigned'])->name('projects.assigned');
    Route::get('/projects/office', [\App\Http\Controllers\ProjectController::class,'office'])->name('projects.office');
    Route::get('/projects/own', [\App\Http\Controllers\ProjectController::class,'own'])->name('projects.own');

    Route::put('/projects/{project}/drop', [\App\Http\Controllers\ProjectController::class,'drop'])->name('projects.drop');

    // Upload
    Route::put('/projects/{project}/upload', [\App\Http\Controllers\ProjectController::class,'upload'])->name('projects.upload');

    Route::put('/projects/{uuid}/restore', [\App\Http\Controllers\ProjectController::class,'restore'])->name('projects.restore');

    Route::put('/projects/{project}/endorse', \App\Http\Controllers\ProjectEndorseController::class)->name('projects.endorse');
    Route::put('/projects/{project}/drop', \App\Http\Controllers\ProjectDropController::class)->name('projects.drop');
    // ProjectReview

    Route::get('/projects/deleted', [\App\Http\Controllers\ProjectController::class,'deleted'])->name('projects.deleted');

    Route::get('/projects/{project}/issues', \App\Http\Controllers\ProjectIssueController::class)->name('projects.issues');
    Route::get('/projects/{project}/history', \App\Http\Controllers\ProjectHistoryController::class)->name('projects.history');
    Route::get('/projects/{project}/generatePdf', [\App\Http\Controllers\ProjectController::class,'generatePdf'])->name('projects.generatePdf');
    Route::get('/projects/{project}/exportJson', [\App\Http\Controllers\ProjectController::class,'exportJson'])->name('projects.exportJson');
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->except('store','create');
    Route::post('/notifications', [\App\Http\Controllers\NotificationController::class,'markAllAsRead'])->name('notifications.markAllAsRead');
    Route::resource('notifications',\App\Http\Controllers\NotificationController::class)->only('index','show');
    Route::resource('pipols',\App\Http\Controllers\PipolController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('/offices/{office}/users', \App\Http\Controllers\OfficeUserController::class)->name('offices.users');
    Route::resource('offices', \App\Http\Controllers\OfficeController::class);

    Route::group(['prefix' => 'reports'], function() {
        Route::get('/', [\App\Http\Controllers\ReportController::class,'index'])->name('reports.index');
        Route::get('/implementation_modes', [\App\Http\Controllers\ReportController::class,'implementation_modes'])->name('reports.implementation_modes');
        Route::get('/offices', [\App\Http\Controllers\ReportController::class,'offices'])->name('reports.offices');
        Route::get('/spatial_coverages', [\App\Http\Controllers\ReportController::class,'spatial_coverages'])->name('reports.spatial_coverages');
        Route::get('/regions', [\App\Http\Controllers\ReportController::class,'regions'])->name('reports.regions');
        Route::get('/funding_sources', [\App\Http\Controllers\ReportController::class,'funding_sources'])->name('reports.funding_sources');
        Route::get('/tiers', [\App\Http\Controllers\ReportController::class,'tiers'])->name('reports.tiers');
        Route::get('/pap_types', [\App\Http\Controllers\ReportController::class,'pap_types'])->name('reports.pap_types');
        Route::get('/pdp_chapters', [\App\Http\Controllers\ReportController::class,'pdp_chapters'])->name('reports.pdp_chapters');
        Route::get('/project_statuses', [\App\Http\Controllers\ReportController::class,'project_statuses'])->name('reports.project_statuses');
    });

    Route::resource('search', \App\Http\Controllers\SearchController::class);

    Route::post('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'update'])->name('change_password_update');
    Route::get('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'index'])->name('change_password_index');

    // Admin routes
    Route::middleware(['admin'])->prefix('/admin')->name('admin.')->group(function () {
        Route::get('', \App\Http\Controllers\Admin\AdminController::class)->name('index');
        Route::resources([
            'links'                 => \App\Http\Controllers\Admin\LinkController::class,
            'offices'               => \App\Http\Controllers\Admin\OfficeController::class,
            'operating_units'       => \App\Http\Controllers\Admin\OperatingUnitController::class,
//        'permissions'           => \App\Http\Controllers\Admin\PermissionController::class,
            'roles'                 => \App\Http\Controllers\Admin\RoleController::class,
            'users'                 => \App\Http\Controllers\Admin\UserController::class,
            'teams'                 => \App\Http\Controllers\Admin\TeamController::class,
        ]);

        Route::resource('permissions',\App\Http\Controllers\Admin\PermissionController::class)->except('create','show');

        Route::post('offices/export',[\App\Http\Controllers\Admin\OfficeController::class,'index'])->name('offices.export');
    });
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/google', [\App\Http\Controllers\Auth\SocialLoginController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\SocialLoginController::class,'handleGoogleCallback'])->name('auth.google-callback');
});

Route::fallback(function () {
    return view('errors.404');
});