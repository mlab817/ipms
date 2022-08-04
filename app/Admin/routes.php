<?php

use App\Admin\Controllers\RefApprovalLevelController;
use App\Admin\Controllers\RefBasisController;
use App\Admin\Controllers\RefCipTypeController;
use App\Admin\Controllers\RefCovidInterventionController;
use App\Admin\Controllers\RefFsStatusController;
use App\Admin\Controllers\RefFundingInstitutionController;
use App\Admin\Controllers\RefFundingSourceController;
use App\Admin\Controllers\RefGadController;
use App\Admin\Controllers\RefImplementationModeController;
use App\Admin\Controllers\RefImplementingAgencyController;
use App\Admin\Controllers\RefInfrastructureSectorController;
use App\Admin\Controllers\RefInfrastructureSubsectorController;
use App\Admin\Controllers\RefOperatingUnitController;
use App\Admin\Controllers\RefOperatingUnitTypeController;
use App\Admin\Controllers\RefPapTypeController;
use App\Admin\Controllers\RefPdpChapterController;
use App\Admin\Controllers\RefPdpIndicatorController;
use App\Admin\Controllers\RefPipolStatusController;
use App\Admin\Controllers\RefPipTypologyController;
use App\Admin\Controllers\RefPrerequisiteController;
use App\Admin\Controllers\RefProjectStatusController;
use App\Admin\Controllers\RefReadinessLevelController;
use App\Admin\Controllers\RefReasonController;
use App\Admin\Controllers\RefRegionController;
use App\Admin\Controllers\RefSdgController;
use App\Admin\Controllers\RefSpatialCoverageController;
use App\Admin\Controllers\RefSubmissionStatusController;
use App\Admin\Controllers\RefTierController;
use App\Admin\Controllers\RefTripIndicatorController;
use App\Admin\Controllers\RefYearController;
use App\Admin\Controllers\UserController;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
//    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('approval-levels', RefApprovalLevelController::class);
    $router->resource('bases', RefBasisController::class);
    $router->resource('cip-types', RefCipTypeController::class);
    $router->resource('covid-interventions', RefCovidInterventionController::class);
    $router->resource('fs-statuses', RefFsStatusController::class);
    $router->resource('funding-institutions', RefFundingInstitutionController::class);
    $router->resource('funding-sources', RefFundingSourceController::class);
    $router->resource('gads', RefGadController::class);
    $router->resource('implementation-modes', RefImplementationModeController::class);
    $router->resource('implementing-agencies', RefImplementingAgencyController::class);
    $router->resource('infrastructure-sectors', RefInfrastructureSectorController::class);
    $router->resource('infrastructure-subsectors', RefInfrastructureSubsectorController::class);
    $router->resource('operating-units', RefOperatingUnitController::class);
    $router->resource('operating-unit-types', RefOperatingUnitTypeController::class);
    $router->resource('pap-types', RefPapTypeController::class);
    $router->resource('pdp-chapters', RefPdpChapterController::class);
    $router->resource('pdp-indicators', RefPdpIndicatorController::class);
    $router->resource('pip-typologies', RefPipTypologyController::class);
    $router->resource('pipol-statuses', RefPipolStatusController::class);
    $router->resource('prerequisites', RefPrerequisiteController::class);
    $router->resource('project-statuses', RefProjectStatusController::class);
    $router->resource('readiness-levels', RefReadinessLevelController::class);
    $router->resource('reasons', RefReasonController::class);
    $router->resource('regions', RefRegionController::class);
    $router->resource('spatial-coverages', RefSpatialCoverageController::class);
    $router->resource('sdgs', RefSdgController::class);
    $router->resource('submission-statuses', RefSubmissionStatusController::class);
    $router->resource('tiers', RefTierController::class);
    $router->resource('trip-indicators', RefTripIndicatorController::class);
    $router->resource('users', UserController::class);
    $router->resource('years', RefYearController::class);

});
