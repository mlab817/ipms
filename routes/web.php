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
Route::middleware(['auth','activated'])->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');

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

    Route::put('/projects/{project}/transfer', \App\Http\Controllers\ProjectTransferController::class)->name('projects.transfer');
    Route::put('/projects/{project}/validate', \App\Http\Controllers\ProjectValidateController::class)->name('projects.validate');
    Route::put('/projects/{project}/endorse', \App\Http\Controllers\ProjectEndorseController::class)->name('projects.endorse');
    Route::put('/projects/{project}/drop', \App\Http\Controllers\ProjectDropController::class)->name('projects.drop');
    Route::put('/projects/{project}/encode', \App\Http\Controllers\ProjectEncodeController::class)->name('projects.encode');
    Route::put('/projects/{project}/undrop', \App\Http\Controllers\ProjectUndropController::class)->name('projects.undrop');
    // ProjectReview

    Route::get('/export', \App\Http\Controllers\ProjectExportController::class)->name('export');
    Route::get('/download', [\App\Http\Controllers\GenerateEndorsementLetter::class,'download'])->name('download');

    Route::get('/projects/deleted', [\App\Http\Controllers\ProjectController::class,'deleted'])->name('projects.deleted');

    Route::get('/projects/{project}/issues', \App\Http\Controllers\ProjectIssueController::class)->name('projects.issues');
    Route::get('/projects/{project}/history', \App\Http\Controllers\ProjectHistoryController::class)->name('projects.history');
    Route::get('/projects/{project}/generatePdf', [\App\Http\Controllers\ProjectController::class,'generatePdf'])->name('projects.generatePdf');
    Route::get('/projects/{project}/exportJson', [\App\Http\Controllers\ProjectController::class,'exportJson'])->name('projects.exportJson');
    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
    Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->except('store','create');
    Route::resource('notifications',\App\Http\Controllers\NotificationController::class)->only('index','show');
    Route::put('/notifications/{notification}', [\App\Http\Controllers\NotificationController::class,'markAsRead'])->name('notifications.markAsRead');
    Route::post('/notifications/markMultipleAsRead', [\App\Http\Controllers\NotificationController::class,'markMultipleAsRead'])->name('notifications.markMultipleAsRead');
    Route::resource('pipols',\App\Http\Controllers\PipolController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::put('/users/{user}/activate', \App\Http\Controllers\UserActivateController::class)->name('users.activate');
    Route::get('/offices/{office}/users', \App\Http\Controllers\OfficeUserController::class)->name('offices.users');
    Route::resource('offices', \App\Http\Controllers\OfficeController::class);

    Route::resource('search', \App\Http\Controllers\SearchController::class);

    Route::post('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'update'])->name('change_password_update');
    Route::get('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'index'])->name('change_password_index');

    Route::get('/encoders', \App\Http\Controllers\SearchEncoderController::class)->name('search.encoders');

    Route::view('/about', 'about')->name('about');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'guest'], function() {
    Route::get('/auth/google', [\App\Http\Controllers\Auth\SocialLoginController::class,'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\SocialLoginController::class,'handleGoogleCallback'])->name('auth.google-callback');
});

Route::get('/debug', function () {
    Log::debug('rollbar is working');
});

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/mailable', function () {
    return new App\Mail\UserCreated(\App\Models\User::find(1), 'password');
});

Route::get('/search_users', function (\Illuminate\Http\Request $request) {
    return \App\Models\User::search($request->q)->get();
});