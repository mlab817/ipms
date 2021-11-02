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
    return RefPdpIndicator::select('id','name')
        ->with('children.children')
        ->where('id', $id)
        ->where('level', 1)
        ->first();
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