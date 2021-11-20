<?php

use App\Http\Controllers\Api\AllocationController;
use App\Http\Controllers\Api\ApprovalLevelController;
use App\Http\Controllers\Api\BasisController;
use App\Http\Controllers\Api\CipTypeController;
use App\Http\Controllers\Api\DisbursementController;
use App\Http\Controllers\Api\FeasibilityStudyController;
use App\Http\Controllers\Api\FsInfrastructureController;
use App\Http\Controllers\Api\FsInvestmentController;
use App\Http\Controllers\Api\FsStatusController;
use App\Http\Controllers\Api\FundingInstitutionController;
use App\Http\Controllers\Api\FundingSourceController;
use App\Http\Controllers\Api\GadController;
use App\Http\Controllers\Api\ImplementationModeController;
use App\Http\Controllers\Api\InfrastructureSectorController;
use App\Http\Controllers\Api\InfrastructureSubsectorController;
use App\Http\Controllers\Api\ModificationController;
use App\Http\Controllers\Api\NepController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\OperatingUnitController;
use App\Http\Controllers\Api\OperatingUnitTypeController;
use App\Http\Controllers\Api\OuInfrastructureController;
use App\Http\Controllers\Api\OuInvestmentController;
use App\Http\Controllers\Api\PapTypeController;
use App\Http\Controllers\Api\PdpChapterController;
use App\Http\Controllers\Api\PdpIndicatorController;
use App\Http\Controllers\Api\PipTypologyController;
use App\Http\Controllers\Api\PreparationDocumentController;
use App\Http\Controllers\Api\PrerequisiteController;
use App\Http\Controllers\Api\ProjectStatusController;
use App\Http\Controllers\Api\ReadinessLevelController;
use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ResettlementActionPlanController;
use App\Http\Controllers\Api\RightOfWayController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\SdgController;
use App\Http\Controllers\Api\SpatialCoverageController;
use App\Http\Controllers\Api\TenPointAgendaController;
use App\Http\Controllers\Api\TierController;
use App\Http\Resources\FundingInstitutionResource;
use App\Http\Resources\GadResource;
use App\Http\Resources\ImplementationModeResource;
use App\Http\Resources\InfrastructureSectorResource;
use App\Http\Resources\OfficeResource;
use App\Http\Resources\OperatingUnitResource;
use App\Http\Resources\PapTypeResource;
use App\Http\Resources\PdpChapterResource;
use App\Http\Resources\PdpIndicatorResource;
use App\Http\Resources\PipTypologyResource;
use App\Http\Resources\PrerequisiteResource;
use App\Http\Resources\ProjectStatusResource;
use App\Http\Resources\RegionResource;
use App\Models\RefGad;
use App\Models\Office;
use App\Models\RefPdpChapter;
use App\Models\RefPdpIndicator;
use App\Models\RefPipTypology;
use App\Models\RefPrerequisite;
use App\Models\RefProjectStatus;
use App\Models\RefRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RegionInfrastructureController;
use App\Http\Controllers\Api\RegionInvestmentController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function() {
    Route::resource('users', UserController::class);
});

Route::post('/login', [AuthController::class,'login'])->name('api.login');

Route::get('/projects/{project}', function (\App\Models\Project $project) {
    return response()->json($project->load('bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','region_investments.region','fs_investments.funding_source','region_infrastructures.region','fs_infrastructures.funding_source','allocation','disbursement','nep','feasibility_study','project_update'));
});

//Route::post('/projects/search', [ProjectController::class,'search'])->name('api.projects.search');

Route::post('/checkEmailAvailability', function (Request $request) {
    if ($request->email) {
        $exists = \App\Models\User::where('email', $request->email)->exists();

        if ($exists) {
            return response()->json(['error' => 'Email address is already taken'], 200);
        } else {
            return response()->json(['success' => 'Email address is available'], 200);
        }
    }
})->name('api.checkEmailAvailability');

//checkUsernameAvailability
Route::get('/checkUsernameAvailability', function (Request $request) {
    if ($request->username) {
        $exists = \App\Models\User::where('username', $request->username)->exists();

        if ($exists) {
            return response()->json(['error' => 'Username is already taken'], 200);
        } else {
            return response()->json(['success' => 'Username is available'], 200);
        }
    }
})->name('api.checkUsernameAvailability');

Route::get('/pdp_chapters/{id}', function ($id) {
    return RefPdpChapter::select('id','name')
        ->with('children.children')
        ->find($id);
})->name('api.pdp_chapters');

Route::get('/checkProjectTitleAvailability', function(Request $request) {
    $title = trim(strtolower($request->title));

    $exists = \App\Models\Project::withoutGlobalScope(\App\Scopes\RoleScope::class)
        ->whereRaw('LOWER(title) = ?', $title)
        ->exists();

    return response()->json(['available' => ! $exists]);
})->name('api.checkProjectTitleAvailability');

Route::get('/encoders', function (Request $request) {
    $encoders = \App\Models\User::where(DB::raw('CONCAT(first_name, " ",last_name)'),'like','%' . $request->q .'%')
        ->where('role_id', \App\Models\Role::findByName('encoder')->id)
        ->get();
    $response = '';
    foreach ($encoders as $encoder) {
        $response .= '<li class="autocomplete-item" role="option" data-autocomplete-value="'. $encoder->username .'">' . $encoder->office->acronym .' - '. $encoder->full_name .'</li>';
    }
    return $response;
});

//// Resources secured by auth
//Route::middleware(['auth:api','activated'])->group(function () {
//    Route::get('/dashboard', \App\Http\Controllers\DashboardController::class)->name('dashboard');
//
//    Route::post('/auth/password/change', \App\Http\Controllers\Auth\ChangePasswordController::class)->name('password.change');
//    Route::get('/settings',\App\Http\Controllers\SettingsController::class)->name('settings');
//
//    // other index routes
//    Route::get('/projects/assigned', [\App\Http\Controllers\ProjectController::class,'assigned'])->name('projects.assigned');
//    Route::get('/projects/office', [\App\Http\Controllers\ProjectController::class,'office'])->name('projects.office');
//    Route::get('/projects/own', [\App\Http\Controllers\ProjectController::class,'own'])->name('projects.own');
//
//    Route::put('/projects/{project}/drop', [\App\Http\Controllers\ProjectController::class,'drop'])->name('projects.drop');
//
//    // Upload
//    Route::put('/projects/{project}/upload', [\App\Http\Controllers\ProjectController::class,'upload'])->name('projects.upload');
//
//    Route::put('/projects/{uuid}/restore', [\App\Http\Controllers\ProjectController::class,'restore'])->name('projects.restore');
//
//    Route::put('/projects/{project}/transfer', \App\Http\Controllers\ProjectTransferController::class)->name('projects.transfer');
//    Route::put('/projects/{project}/invalidate', \App\Http\Controllers\ProjectInvalidateController::class)->name('projects.invalidate');
//    Route::put('/projects/{project}/validate', \App\Http\Controllers\ProjectValidateController::class)->name('projects.validate');
//    Route::put('/projects/{project}/endorse', \App\Http\Controllers\ProjectEndorseController::class)->name('projects.endorse');
//    Route::put('/projects/{project}/drop', \App\Http\Controllers\ProjectDropController::class)->name('projects.drop');
//    Route::put('/projects/{project}/encode', \App\Http\Controllers\ProjectEncodeController::class)->name('projects.encode');
//    Route::put('/projects/{project}/undrop', \App\Http\Controllers\ProjectUndropController::class)->name('projects.undrop');
//    // ProjectReview
//
//    Route::get('/export', \App\Http\Controllers\ProjectExportController::class)->name('export');
//    Route::get('/download', [\App\Http\Controllers\GenerateEndorsementLetter::class,'download'])->name('download');
//
//    Route::get('/projects/deleted', [\App\Http\Controllers\ProjectController::class,'deleted'])->name('projects.deleted');
//
//    Route::get('/projects/{project}/issues', \App\Http\Controllers\ProjectIssueController::class)->name('projects.issues');
//    Route::get('/projects/{project}/history', \App\Http\Controllers\ProjectHistoryController::class)->name('projects.history');
//    Route::get('/projects/{project}/generatePdf', [\App\Http\Controllers\ProjectController::class,'generatePdf'])->name('projects.generatePdf');
//    Route::get('/projects/{project}/exportJson', [\App\Http\Controllers\ProjectController::class,'exportJson'])->name('projects.exportJson');
//    Route::resource('projects', \App\Http\Controllers\ProjectController::class);
//    Route::resource('reviews', \App\Http\Controllers\ReviewController::class)->except('store','create');
//    Route::resource('notifications',\App\Http\Controllers\NotificationController::class)->only('index','show');
//    Route::put('/notifications/{notification}', [\App\Http\Controllers\NotificationController::class,'markAsRead'])->name('notifications.markAsRead');
//    Route::post('/notifications/markMultipleAsRead', [\App\Http\Controllers\NotificationController::class,'markMultipleAsRead'])->name('notifications.markMultipleAsRead');
//
//    Route::resource('users', \App\Http\Controllers\Api\UserController::class);
//
//    Route::put('/users/{user}/activate', \App\Http\Controllers\UserActivateController::class)->name('users.activate');
//    Route::get('/offices/{office}/users', \App\Http\Controllers\OfficeUserController::class)->name('offices.users');
//    Route::resource('offices', \App\Http\Controllers\OfficeController::class);
//
//    Route::resource('search', \App\Http\Controllers\SearchController::class);
//
//    Route::post('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'update'])->name('change_password_update');
//    Route::get('password/change', [\App\Http\Controllers\Auth\PasswordChangeController::class,'index'])->name('change_password_index');
//
//    Route::get('/encoders', \App\Http\Controllers\SearchEncoderController::class)->name('search.encoders');
//
//    Route::view('/about', 'about')->name('about');
//});
//
//Route::group(['middleware' => 'guest'], function() {
//    Route::get('/auth/google', [\App\Http\Controllers\Auth\SocialLoginController::class,'redirectToGoogle'])->name('auth.google');
//    Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\SocialLoginController::class,'handleGoogleCallback'])->name('auth.google-callback');
//});
//
//Route::get('/debug', function () {
//    Log::debug('rollbar is working');
//});
//
//Route::fallback(function () {
//    return view('errors.404');
//});
//
//Route::get('/mailable', function () {
//    return new App\Mail\UserCreated(\App\Models\User::find(1), 'password');
//});
//
//Route::get('/search_users', function (\Illuminate\Http\Request $request) {
//    return \App\Models\User::search($request->q)->get();
//});