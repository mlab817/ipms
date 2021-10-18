@extends('layouts.app')

@section('content')
    <div class="Box">
        <div class="Box-header py-2 pr-2 d-flex flex-shrink-0 flex-md-row flex-items-center">
            <div class="d-flex flex-items-center flex-auto">
                <details class="dropdown details-reset details-overlay d-inline-block">
                    <summary class="color-fg-muted p-2 d-inline btn btn-octicon mr-2 m-0 p-2" aria-haspopup="true">
                        <svg class="octicon octicon-list-unordered" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                    </summary>

                    <ul class="dropdown-menu dropdown-menu-e">
                        <li><a class="dropdown-item" href="#general-information">General Information</a></li>
                        <li><a class="dropdown-item" href="#implementing-agencies">Implementing Agencies</a></li>
                        <li><a class="dropdown-item" href="#spatial-coverage">Spatial Coverage</a></li>
                        <li><a class="dropdown-item" href="#approval-status">Approval Status</a></li>
                        <li><a class="dropdown-item" href="#programming-document">Project for Inclusion in Which Programming Document</a></li>
                        <li><a class="dropdown-item" href="#physical-and-financial-status">Physical and Financial Status</a></li>
                        <li><a class="dropdown-item" href="#implementation-period">Implementation Period</a></li>
                        <li><a class="dropdown-item" href="#pdp">Philippine Development Plan</a></li>
                        <li><a class="dropdown-item" href="#pdp-rm-indicators">Philippine Development Results Matrices (PDP-RM) Indicators</a></li>
                        <li><a class="dropdown-item" href="#sdgs">Sustainable Development Goals</a></li>
                        <li><a class="dropdown-item" href="#ten-point-agenda">Ten Point Agenda</a></li>
                        <li><a class="dropdown-item" href="#project-preparation-details">Project Preparation Details</a></li>
                        <li><a class="dropdown-item" href="#preconstruction-costs">Pre-construction Costs</a></li>
                        <li><a class="dropdown-item" href="#employment-generation">Employment Generation</a></li>
                        <li><a class="dropdown-item" href="#funding-source">Funding Source and Mode of Implementation</a></li>
                        <li><a class="dropdown-item" href="#project-costs">Project Costs</a></li>
                        <li><a class="dropdown-item" href="#financial-accomplishments">Financial Accomplishments</a></li>
                        <li><a class="dropdown-item" href="#trip-information">TRIP Information</a></li>
                    </ul>
                </details>

                <h2 class="Box-title">
                    {{ $project->title }}
                </h2>
            </div>

            <div class="d-flex py-1 py-md-0 flex-auto flex-order-1 flex-md-order-2 flex-sm-grow-0 flex-justify-between hide-sm hide-md">
                <form class="inline-form" action="{{ route('projects.destroy', $project) }}" accept-charset="UTF-8" method="post">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Are you sure you want to delete this PAP?')" class="btn-octicon btn-octicon-danger tooltipped tooltipped-nw" type="submit" aria-label="Delete this PAP" data-disable-with="">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-trash">
                            <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <form action="{{ route('projects.update', $project->uuid) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="Box-body">


            <div class="container-fluid">
                @if($errors->any())
                    <div class="callout callout-danger">
                        <h5>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-sm" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Error:</h5>
                        Please check the form for errors.
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="callout callout-info">
                                <h5>Instruction:</h5>

                                <p>All fields with red asterisk (<span class="text-danger">*</span>) are required. The
                                    system does
                                    not accept decimal places (.00) so input only whole numbers.</p>
                            </div>
                        </div>
                    </div>

                    <x-subhead subhead="General Information"></x-subhead>

                    <dl class="form-group @error('title') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="title" class="required">Title </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.text name="title" value="{{ old('title', $project->title) }}" aria-describedby="title-validation"></x-input.text>
                            <x-error-message name="title" id="title-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ref_pap_type_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_pap_type_id" class="required">Program or Project </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select :options="$pap_types" name="ref_pap_type_id" selected="{{ old('ref_pap_type_id', $project->ref_pap_type_id) }}" aria-describedby="pap-type-validation"></x-select>
                            <x-error-message name="ref_pap_type_id" id="pap-type-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('regular_program') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="regular_program" class="required">Is this a regular program? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="regular_program" selected="{{ old('regular_program', $project->regular_program) }}" aria-describedby="regular-program-validation"></x-input.radio>
                            <x-error-message name="regular_program" id="regular-program-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('bases') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="bases" class="required">Basis for Implementation </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.checkbox :options="$bases" name="bases[]" :selected="old('bases', $project->bases->pluck('id')->toArray() ?? [])" aria-describedby="bases-validation"></x-input.checkbox>
                            <x-error-message name="bases[]" id="bases-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('description') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="description" class="required">Description </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-textarea name="description" :value="old('description', $project->description->description ?? '')"></x-textarea>
                            <x-error-message name="description" id="description-validation"></x-error-message>
                        </dd>
                    </dl>

                    <x-subhead subhead="Implementing Agencies"></x-subhead>

                    <dl class="form-group @error('office_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="office_id" class="required">Office </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select name="office_id" :options="$offices" :selected="old('office_id', $project->office_id)" aria-describedby="office-id-validation"></x-select>
                            <x-error-message name="office_id" id="office-id-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('operating_units') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="operating_units" class="required">Basis for Implementation </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.checkbox :options="$operating_units" name="operating_units[]" :selected="old('operating_units', $project->operating_units->pluck('id')->toArray() ?? [])" aria-describedby="operating-units-validation"></x-input.checkbox>
                            <x-error-message name="operating_units[]" id="operating-units-validation"></x-error-message>
                        </dd>
                    </dl>

                    <x-subhead subhead="Spatial Coverage"></x-subhead>

                    <dl class="form-group @error('ref_spatial_coverage_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_spatial_coverage_id" class="required">Spatial Coverage </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select name="ref_spatial_coverage_id" :options="$spatial_coverages" :selected="old('ref_spatial_coverage_id', $project->ref_spatial_coverage_id)" aria-describedby="spatial-coverage-validation"></x-select>
                            <x-error-message name="ref_spatial_coverage_id" id="spatial-coverage-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('regions') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="regions" class="required">Regions </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.checkbox :options="$regions" name="regions[]" :selected="old('regions', $project->regions->pluck('id')->toArray() ?? [])" aria-describedby="regions-validation"></x-input.checkbox>
                            <x-error-message name="regions[]" id="regions-validation"></x-error-message>
                        </dd>
                    </dl>

                    <x-subhead subhead="Level of Approval"></x-subhead>

                    <dl class="form-group @error('iccable') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="iccable" class="required">Will require Investment Coordination Committee/NEDA Board Approval (ICC-able)? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="iccable" selected="{{ old('iccable', $project->iccable) }}" aria-describedby="iccable-validation"></x-input.radio>
                            <x-error-message name="iccable" id="iccable-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ref_approval_level_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_approval_level_id">Level of Approval (only if ICC-able) </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select name="ref_approval_level_id" :options="$approval_levels" :selected="old('ref_approval_level_id', $project->ref_approval_level_id)" aria-describedby="approval-level-validation"></x-select>
                            <x-error-message name="ref_approval_level_id" id="approval-level-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('approval_date') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="approval_date">
                                Date of Submission / Approval
                            </label>
                        </dt>
                        <dd class="form-group-body">
                            <input id="approval_date" name="approval_date" type="date" class="form-control" aria-describedby="approval-date-validation" value="{{ old('approval_date', $project->approval_date) }}">
                            <x-error-message name="approval_date" id="approval-date-validation"></x-error-message>
                        </dd>
                    </dl>

                    <x-subhead subhead="Project for Inclusion in Which Programming Document"></x-subhead>

                    <dl class="form-group @error('pip') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="pip" class="required">Public Investment Program (PIP) </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="pip" selected="{{ old('pip', $project->pip) }}" aria-describedby="pip-validation"></x-input.radio>
                            <x-error-message name="pip" id="pip-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ref_pip_typology_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_pip_typology_id" class="required">Typology </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select name="ref_pip_typology_id" :options="$pip_typologies" :selected="old('ref_pip_typology_id', $project->ref_pip_typology_id)" aria-describedby="pip-typology-validation"></x-select>
                            <x-error-message name="ref_pip_typology_id" id="pip-typology-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('cip') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="cip" class="required">Core Investment Programs/Projects (CIP) </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="cip" selected="{{ old('cip', $project->cip) }}" aria-describedby="cip-validation"></x-input.radio>
                            <x-error-message name="cip" id="cip-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ref_cip_type_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_cip_type_id" class="required">Type of CIP </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select name="ref_cip_type_id" :options="$cip_types" :selected="old('ref_cip_type_id', $project->ref_cip_type_id)" aria-describedby="cip-type-validation"></x-select>
                            <x-error-message name="ref_cip_type_id" id="cip-type-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('trip') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="trip" class="required">Three-Year Rolling Infrastructure Program (TRIP) </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="trip" selected="{{ old('trip', $project->trip) }}" aria-describedby="trip-validation"></x-input.radio>
                            <x-error-message name="trip" id="trip-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('research') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="research" class="required">Is it a Research and Development Program/Project? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="research" selected="{{ old('research', $project->research) }}" aria-describedby="research-validation"></x-input.radio>
                            <x-error-message name="research" id="research-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ifp') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ifp" class="required">Is it an Infrastructure Flagship Project(IFP)? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="ifp" selected="{{ old('ifp', $project->ifp) }}" aria-describedby="ifp-validation"></x-input.radio>
                            <x-error-message name="ifp" id="ifp-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('ict') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ict" class="required">Is it an ICT program/project? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="ict" selected="{{ old('ict', $project->ict) }}" aria-describedby="ict-validation"></x-input.radio>
                            <x-error-message name="ict" id="ict-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('covid') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="covid" class="required">Is it responsive to COVID-19/New Normal Intervention? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="covid" selected="{{ old('covid', $project->covid) }}" aria-describedby="covid-validation"></x-input.radio>
                            <x-error-message name="covid" id="covid-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('covid_interventions') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="covid_interventions" class="required">Included in the following documents: </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.checkbox :options="$covid_interventions" name="covid_interventions[]" :selected="old('covid_interventions', $project->covid_interventions->pluck('id')->toArray() ?? [])" aria-describedby="covid-interventions-validation"></x-input.checkbox>
                            <x-error-message name="covid_interventions[]" id="covid-interventions-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('rdip') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="rdip" class="required">Is it responsive to COVID-19/New Normal Intervention? </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.radio :options="$boolean" name="rdip" selected="{{ old('rdip', $project->rdip) }}" aria-describedby="rdip-validation"></x-input.radio>
                            <x-error-message name="rdip" id="rdip-validation"></x-error-message>
                        </dd>
                    </dl>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Spatial Coverage") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="spatial_coverage_id" class="col-form-label col-sm-3 required">Spatial
                                            Coverage </label>
                                        <div class="col-sm-9">
                                            <select name="spatial_coverage_id" id="spatial_coverage_id"
                                                    class="form-control @error('spatial_coverage_id') is-invalid @enderror">
                                                <option value="" selected disabled>Select Spatial Coverage</option>
                                                @foreach($spatial_coverages as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('spatial_coverage_id', $project->spatial_coverage_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('spatial_coverage_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="regions" class="col-form-label required">Regions </label>
                                            <p>
                                                <button type="button" id="selectRegions" class="btn btn-sm btn-secondary">
                                                    Check All
                                                </button>
                                                <button type="button" id="clearRegions" class="btn btn-sm btn-danger">
                                                    Clear
                                                </button>
                                            </p>
                                        </div>
                                        <div class="col-sm-9">
                                            @foreach($regions->sortBy('order') as $option)
                                                @if($option->id !== 99)
                                                    <div class="form-check">
                                                        <label
                                                                class="form-check-label @error('regions') text-danger @enderror">
                                                            <input
                                                                    class="regions-checkboxes form-check-input"
                                                                    type="checkbox" name="regions[]"
                                                                    value="{{ $option->id }}" {{ in_array($option->id, old('regions', $project->regions->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}>
                                                            {{ $option->name }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                            @error('regions')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Implementation Period -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Implementation Period") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="target_start_year" class="col-form-label col-sm-6 required">Start
                                                    of Implementation </label>
                                                <div class="col-sm-6">
                                                    <select
                                                            class="form-control @error('target_start_year') is-invalid @enderror"
                                                            name="target_start_year">
                                                        <option value="" disabled selected>Select Year</option>
                                                        @foreach($years as $option)
                                                            <option
                                                                    value="{{ $option }}"
                                                                    @if(old('target_start_year', $project->target_start_year) == $option) selected @endif>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('target_start_year')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="target_end_year" class="col-form-label col-sm-6 required">Year
                                                    of Project Completion </label>
                                                <div class="col-sm-6">
                                                    <select
                                                            class="form-control @error('target_end_year') is-invalid @enderror"
                                                            name="target_end_year">
                                                        <option value="" disabled selected>Select Year</option>
                                                        @foreach($years as $option)
                                                            <option
                                                                    value="{{ $option }}"
                                                                    @if(old('target_end_year', $project->target_end_year) == $option) selected @endif>{{ $option }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('target_end_year')<span
                                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Implementation Period -->

                        <!-- Approval Status -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Approval Status") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="iccable" class="col-form-label col-sm-3 required">Is the Project ICC-able? </label>
                                        <div class="col-sm-9">
                                            <div class="form-check-inline">
                                                <input type="radio" class="form-check-input" value="1"
                                                       name="iccable"
                                                       @if(old('iccable', $project->iccable) == 1) checked @endif>
                                                <label class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input type="radio" class="form-check-input" value="0"
                                                       name="iccable"
                                                       @if(old('iccable', $project->iccable) == 0) checked @endif>
                                                <label class="form-check-label">No</label>
                                            </div>
                                            @error('iccable')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="target_start_year" class="col-form-label col-sm-3">Level of Approval
                                            (For ICCable only)</label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('approval_level_id') is-invalid @enderror"
                                                    name="approval_level_id">
                                                <option value="" disabled selected>Select Approval Level</option>
                                                @foreach($approval_levels as $option)
                                                    <option
                                                            value="{{ $option->id }}"
                                                            @if(old('approval_level_id', $project->approval_level_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('approval_level_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="approval_date" class="col-form-label col-sm-3">Date of
                                            Submission/Approval</label>
                                        <div class="col-sm-9">
                                            <input type="date"
                                                   class="form-control @error('approval_date') is-invalid @enderror"
                                                   name="approval_date"
                                                   value="{{ old('approval_date', $project->approval_date) }}">
                                            @error('approval_date')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gad_id" class="col-form-label col-sm-3 required">Gender
                                            Responsiveness </label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('gad_id') is-invalid @enderror"
                                                    name="gad_id">
                                                <option value="" disabled selected>Select GAD Classification</option>
                                                @foreach($gads as $option)
                                                    <option
                                                            value="{{ $option->id }}" {{ old('gad_id', $project->gad_id) == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('gad_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Approval Status -->

                        <!--/. Regional Development Investment Program -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Regional Development Investment Program</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3 required">Regional Development Investment Program </label>
                                        <div class="col-sm-9">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdip" value="1"
                                                           @if(old('rdip', $project->rdip) == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="rdip" value="0"
                                                           @if(old('rdip', $project->rdip) == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('rdip')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3 required">Is RDC endorsement required? </label>
                                            <div class="col-sm-9">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                               name="rdc_endorsement_required" value="1"
                                                               @if(old('rdc_endorsement_required', $project->rdc_endorsement_required) == 1) checked @endif>
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio"
                                                               name="rdc_endorsement_required" value="0"
                                                               @if(old('rdc_endorsement_required', $project->rdc_endorsement_required) == 0) checked @endif>
                                                        No
                                                    </label>
                                                </div>
                                                @error('rdc_endorsement_required')<span
                                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="rdc_endorsed" class="col-form-label col-sm-3">Has the project been
                                                endorsed?</label>
                                            <div class="col-sm-9">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="rdc_endorsed"
                                                               value="1"
                                                               @if(old('rdc_endorsed', $project->rdc_endorsed) == 1) checked @endif>
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="rdc_endorsed"
                                                               value="0"
                                                               @if(old('rdc_endorsed', $project->rdc_endorsed) == 0) checked @endif>
                                                        No
                                                    </label>
                                                </div>
                                                @error('rdc_endorsed')<span
                                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="rdc_endorsed_date" class="col-form-label col-sm-3">RDC Endorsement
                                                Date</label>
                                            <div class="col-sm-9">
                                                <input type="date"
                                                       class="form-control @error('rdc_endorsed_date') is-invalid @enderror"
                                                       name="rdc_endorsed_date" value="{{ old('rdc_endorsed_date') }}">
                                                @error('rdc_endorsed_date')<span
                                                        class="error invalid-feedback">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Regional Development Investment Program -->

                        <!-- Project Preparation Details -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Project Preparation Details") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="preparation_document_id" class="col-form-label col-sm-3 required">Project
                                            Preparation Document </label>
                                        <div class="col-sm-9">
                                            <select name="preparation_document_id" id="preparation_document_id"
                                                    class="form-control">
                                                <option value="" selected disabled>Select document</option>
                                                @foreach($preparation_documents as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('preparation_document_id', $project->preparation_document_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('preparation_document_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="has_fs" class="col-form-label col-sm-3 required">Does the project require
                                            feasibility study? </label>
                                        <div class="col-sm-9">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1"
                                                           name="has_fs" {{ old('has_fs', $project->has_fs) == 1 ? 'checked' : '' }}>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0"
                                                           name="has_fs" {{ old('has_fs', $project->has_fs) == 0 ? 'checked' : '' }}>
                                                    No
                                                </label>
                                            </div>
                                            @error('has_fs')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fs_status_id" class="col-form-label col-sm-3">Status of Feasibility
                                            Study (Only if FS is required)</label>
                                        <div class="col-sm-9">
                                            <select name="feasibility_study[fs_status_id]" id="fs_status_id"
                                                    class="form-control">
                                                <option value="" selected disabled>Select Status</option>
                                                @foreach($fs_statuses as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('feasibility_study.fs_status_id', $project->feasibility_study->fs_status_id ?? '') == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('feasibility_study.fs_status_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="feasibility_study.needs_assistance" class="col-form-label col-sm-3">Does
                                            the conduct of feasibility
                                            study need assistance?</label>
                                        <div class="col-sm-9">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="1"
                                                           name="feasibility_study[needs_assistance]"
                                                           @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 1) checked @endif>
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="0"
                                                           name="feasibility_study[needs_assistance]"
                                                           @if(old('feasibility_study.need_assistance', $project->feasibility_study->need_assistance ?? '') == 0) checked @endif>
                                                    No
                                                </label>
                                            </div>
                                            @error('feasibility_study.need_assistance')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fs_cost">Schedule of Feasibility Study Cost (in absolute PhP)</label>
                                        <table class="col-sm-12" id="fs_cost">
                                            <thead>
                                            <tr>
                                                <th class="text-sm text-center">2017</th>
                                                <th class="text-sm text-center">2018</th>
                                                <th class="text-sm text-center">2019</th>
                                                <th class="text-sm text-center">2020</th>
                                                <th class="text-sm text-center">2021</th>
                                                <th class="text-sm text-center">2022</th>
                                                <th class="text-sm text-center">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2017]"
                                                           value="{{ old('feasibility_study.y2017', $project->feasibility_study->y2017 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2018]"
                                                           value="{{ old('feasibility_study.y2018', $project->feasibility_study->y2018 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2019]"
                                                           value="{{ old('feasibility_study.y2019', $project->feasibility_study->y2019 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2020]"
                                                           value="{{ old('feasibility_study.y2020', $project->feasibility_study->y2020 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2021]"
                                                           value="{{ old('feasibility_study.y2021', $project->feasibility_study->y2021 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money fs form-control text-right"
                                                           name="feasibility_study[y2022]"
                                                           value="{{ old('feasibility_study.y2022', $project->feasibility_study->y2022 ?? 0) }}">
                                                </td>
                                                <td>
                                                    <input type="text" class="money form-control text-right" id="fs_total"
                                                           readonly>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group row">
                                        <label for="feasibility_study[completion_date]" class="col-form-label col-sm-3">Expected/Target
                                            Date of Completion of FS</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control"
                                                   name="feasibility_study[completion_date]"
                                                   value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Project Preparation Details -->

                        <!-- Employment Generation -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Employment Generation") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="employment_generated" class="col-form-label col-sm-3 required">No. of
                                            persons to
                                            be employed after completion of the project</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('employment_generated') is-invalid @enderror"
                                                   type="number" name="employment_generated"
                                                   value="{{ old('employment_generated', $project->employment_generated) }}">
                                            @error('employment_generated')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Employment Generation -->

                        <!-- Philippine Development Plan Chapter -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Philippine Development Plan") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="pdp_chapter_id" class="col-form-label required">Main philippine
                                                Development Chapter </label>
                                            <p class="text-sm text-muted">Note: Selected PDP indicators will be cleared if
                                                you select another PDP chapter.</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <select id="pdp_chapter_id" name="pdp_chapter_id"
                                                    class="form-control @error('pdp_chapter_id') is-invalid @enderror">
                                                <option value="" disabled selected>Select Main PDP Chapter</option>
                                                @foreach($pdp_chapters as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('pdp_chapter_id', $project->pdp_chapter_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="pdp_chapter_id" class="col-form-label required">Other PDP
                                                Chapters </label>
                                            <p class="text-sm text-muted">Note: Please re-select the main PDP chapter.</p>
                                        </div>
                                        <div class="col-sm-9">
                                            @foreach($pdp_chapters as $option)
                                                <div class="form-check">
                                                    <label class="form-check-label" for="pdp_chapter_{{ $option->id }}">
                                                        <input id="pdp_chapter_{{ $option->id }}" type="checkbox"
                                                               value="{{ $option->id }}" class="form-check-input"
                                                               name="pdp_chapters[]"
                                                               @if(in_array($option->id, old('pdp_chapters', $project->pdp_chapters->pluck('id')->toArray() ?? []))) checked @endif>
                                                        {{ $option->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Philippine Development Plan Chapter -->

                        <!-- Philippine Development Plan Indicators -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Philippine Development Results Matrices (PDP-RM) Indicators") }}</h3>
                                </div>
                                <!-- TODO: PDP Indicators as Vue component -->
                                <div class="card-body">
                                    <div class="form-check">
                                        <label for="no_pdp_indicator" class="form-check-label">
                                            <input type="checkbox" value="1" id="no_pdp_indicator" name="no_pdp_indicator"
                                                   class="form-check-input">
                                            No PDP Indicator applicable
                                        </label>
                                    </div>

                                    <div id="pdp_indicators_group" class="form-group mt-2">
                                        @foreach ($pdp_indicators as $pi1)
                                            <div id="pdp_chapter_{{$pi1->id}}" class="pdp_chapters" style="display: none;">
                                                <span class="font-weight-bold">{{ $pi1->name }}</span>
                                                @foreach($pi1->children as $pi2)
                                                    <div class="ml-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="pdp_outcome_{{$pi2->id}}">
                                                                <input type="checkbox"
                                                                       class="form-check-input pdp_indicators"
                                                                       value="{{$pi2->id}}"
                                                                       name="pdp_indicators[]"
                                                                       id="pdp_outcome_{{$pi2->id}}"
                                                                       @if(in_array($pi2->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                {{ $pi2->name }}
                                                            </label>
                                                        </div>
                                                        <div>
                                                            @foreach($pi2->children as $pi3)
                                                                <div class="ml-4">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label"
                                                                               for="pdp_suboutcome_{{$pi3->id}}">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input pdp_indicators"
                                                                                   value="{{$pi3->id}}"
                                                                                   name="pdp_indicators[]"
                                                                                   id="pdp_suboutcome_{{$pi3->id}}"
                                                                                   @if(in_array($pi3->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                            {{ $pi3->name }}
                                                                        </label>
                                                                    </div>
                                                                    @foreach($pi3->children as $pi4)
                                                                        <div class="ml-4">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label"
                                                                                       for="pdp_output_{{$pi4->id}}">
                                                                                    <input type="checkbox"
                                                                                           class="form-check-input pdp_indicators"
                                                                                           value="{{$pi4->id}}"
                                                                                           name="pdp_indicators[]"
                                                                                           id="pdp_output_{{$pi4->id}}"
                                                                                           @if(in_array($pi4->id, old('pdp_indicators', $project->pdp_indicators->pluck('id')->toArray() ?? []))) checked @endif>
                                                                                    {{ $pi4->name }}
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Philippine Development Plan Indicators -->

                        <!-- Sustainable Development Goals -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Sustainable Development Goals") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <p class="text-sm text-muted">Select all that applies</p>
                                    </div>
                                    <div class="row">
                                        @foreach($sdgs as $option)
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="sdg_{{ $option->id }}">
                                                        <input id="sdg_{{ $option->id }}" type="checkbox"
                                                               value="{{ $option->id }}" class="form-check-input"
                                                               name="sdgs[]"
                                                               @if(in_array($option->id, old('sdgs', $project->sdgs->pluck('id')->toArray() ?? []))) checked @endif>
                                                        {{ $option->name }}
                                                        <p class="text-xs">{{ $option->description }}</p>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('sdgs')<span class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Sustainable Development Goals -->

                        <!-- Ten Point Agenda -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Ten Point Agenda") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <p class="text-sm text-muted">Select all that applies</p>
                                    </div>
                                    <div class="row">
                                        @foreach($ten_point_agendas as $option)
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="tpa_{{ $option->id }}">
                                                        <input id="tpa_{{ $option->id }}" type="checkbox"
                                                               value="{{ $option->id }}" class="form-check-input"
                                                               name="ten_point_agendas[]"
                                                               @if(in_array($option->id, old('ten_point_agendas', $project->ten_point_agendas->pluck('id')->toArray() ?? []))) checked @endif>
                                                        {{ $option->name }}
                                                        <p class="text-xs">{{ $option->description }}</p>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                        @error('ten_point_agendas')<span
                                                class="error invalid-feedback">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Ten Point Agenda -->

                        <!-- Financial Information -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Financial Information") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="funding_source_id" class="col-form-label col-sm-3 required">Main Funding Source </label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('funding_source_id') is-invalid @enderror"
                                                    name="funding_source_id">
                                                <option value="" disabled selected>Select Funding Source</option>
                                                @foreach($funding_sources as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('funding_source_id', $project->funding_source_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('funding_source_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <label for="funding_sources" class="col-form-label required">Other Funding
                                                Sources</label>
                                            <p class="text-sm text-muted">Note: Please re-select the main funding source
                                                selected.</p>
                                        </div>
                                        <div class="col-sm-9">
                                            @foreach($funding_sources as $option)
                                                <div class="form-check">
                                                    <label class="form-check-label" for="fs_{{ $option->id }}">
                                                        <input id="fs_{{ $option->id }}" type="checkbox"
                                                               value="{{ $option->id }}" class="form-check-input"
                                                               name="funding_sources[]"
                                                               @if(in_array($option->id, old('funding_sources', $project->funding_sources->pluck('id')->toArray() ?? []))) checked @endif>
                                                        {{ $option->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('funding_sources')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                            <p class="text-sm text-muted">Include the main funding source selected.</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="other_fs" class="col-form-label col-sm-3">Other Funding Source
                                            (specify)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="other_fs" id="other_fs"
                                                   placeholder="Other funding source (please specify)"
                                                   value="{{ old('other_fs', $project->other_fs) }}">
                                            @error('other_fs')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="implementation_mode_id" class="col-form-label col-sm-3 required">Mode of
                                            Implementation </label>
                                        <div class="col-sm-9">
                                            <select
                                                    class="form-control @error('implementation_mode_id') is-invalid @enderror"
                                                    name="implementation_mode_id">
                                                <option value="" disabled selected>Select Implementation Mode</option>
                                                @foreach($implementation_modes as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('implementation_mode_id', $project->implementation_mode_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('implementation_mode_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="funding_institution_id" class="col-form-label col-sm-3">Funding
                                            Institution</label>
                                        <div class="col-sm-9">
                                            <select class="form-control select2" name="funding_institution_id">
                                                <option value="" disabled selected>Select Funding Institution</option>
                                                @foreach($funding_institutions as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('funding_institution_id', $project->funding_institution_id) == $option->id) selected @endif>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('funding_institution_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tier_id" class="col-form-label col-sm-3 required">Budget Tier </label>
                                        <div class="col-sm-9">
                                            <select class="form-control @error('tier_id') is-invalid @enderror"
                                                    name="tier_id">
                                                <option value="" disabled selected>Select Budget Tier</option>
                                                @foreach($tiers as $option)
                                                    <option value="{{ $option->id }}"
                                                            @if(old('tier_id', $project->tier_id) == $option->id) selected @enderror>{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tier_id')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uacs_code" class="col-form-label col-sm-3">UACS Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('uacs_code') is-invalid @enderror"
                                                   name="uacs_code" id="uacs_code" placeholder="UACS Code"
                                                   value="{{ old('uacs_code', $project->uacs_code) }}">
                                            @error('uacs_code')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Financial Information -->

                        <!-- Status & Updates -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Status & Updates") }}</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="updates" class="col-form-label col-sm-3 required">Updates </label>
                                        <div class="col-sm-9">
                                        <textarea rows="4" style="resize: none;"
                                                  class="form-control @error('updates') is-invalid @enderror"
                                                  id="updates"
                                                  name="updates"
                                                  placeholder="For proposed program/project, please indicate the physical status of the program/project in terms of project preparation, approval, funding, etc. If ongoing or completed, please provide information on the delivery of outputs, percentage of completion and financial status/ accomplishment in terms of utilization rate.">{{ old('updates', $project->project_update->updates) }}</textarea>
                                            @error('updates')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="updates_date" class="col-form-label col-sm-3 required">As of </label>
                                        <div class="col-sm-9">
                                            <input type="date"
                                                   class="form-control @error('updates_date') is-invalid @enderror"
                                                   id="updates_date" name="updates_date"
                                                   value="{{ old('updates_date', $project->project_update->updates_date) }}">
                                            @error('updates_date')<span
                                                    class="error invalid-feedback">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/. Status & Updates -->

                        <!-- Funding Source Breakdown -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Investment Required by Funding Source") }} </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table-responsive">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-sm text-center">2016 &amp; Prior</th>
                                            <th class="text-sm text-center">2017</th>
                                            <th class="text-sm text-center">2018</th>
                                            <th class="text-sm text-center">2019</th>
                                            <th class="text-sm text-center">2020</th>
                                            <th class="text-sm text-center">2021</th>
                                            <th class="text-sm text-center">2022</th>
                                            <th class="text-sm text-center">2023 &amp; Beyond</th>
                                            <th class="text-sm text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($project->fs_investments as $fs)
                                            <tr>
                                                <th class="text-sm">
                                                    <input type="hidden" name="fs_investments[{{ $fs->id }}][fs_id]"
                                                           value="{{ old('fs_investments.{$fs->id}.fs_id', $fs->fs_id ?? 0) }}">
                                                    {{ $fs->funding_source->name }}
                                                </th>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2016 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2016]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2016", $fs->y2016 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2017 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2017]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2017", $fs->y2017 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2018 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2018]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2018", $fs->y2018 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2019 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2019]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2019", $fs->y2019 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2020 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2020]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2020", $fs->y2020 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2021 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2021]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2021", $fs->y2021 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2022 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2022]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2022", $fs->y2022 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="fs_investments fs_investments_2023 fs_investments_{{$fs->fs_id}} money form-control text-right"
                                                           name="fs_investments[{{$fs->id}}][y2023]"
                                                           value="{{ old("fs_investments.{$fs->id}.y2023", $fs->y2023 ?? 0) }}">
                                                </td>
                                                <td><input type="text" class="form-control text-right"
                                                           id="fs_investments_{{$fs->fs_id}}_total" readonly></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2016_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2017_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2018_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2019_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2020_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2021_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2022_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="fs_investments_2023_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control text-right" id="fs_investments_total"
                                                       readonly>
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/. Funding Source Breakdown -->

                        <!-- Regional Breakdown -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Investment Required by RefRegion") }} </h3>
                                </div>
                                <div class="card-body">
                                    <table class="table-responsive">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-sm text-center">2016 &amp; Prior</th>
                                            <th class="text-sm text-center">2017</th>
                                            <th class="text-sm text-center">2018</th>
                                            <th class="text-sm text-center">2019</th>
                                            <th class="text-sm text-center">2020</th>
                                            <th class="text-sm text-center">2021</th>
                                            <th class="text-sm text-center">2022</th>
                                            <th class="text-sm text-center">2023 &amp; Beyond</th>
                                            <th class="text-sm text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($project->region_investments->sortBy('region.order') as $ri)
                                            <tr>
                                                <td class="text-sm text-nowrap">
                                                    <input type="hidden"
                                                           name="region_investments[{{$ri->id}}][region_id]"
                                                           value="{{ $ri->region_id }}">
                                                    {{ $ri->region->label }}
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2016 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2016]"
                                                           value="{{ old("region_investments.{$ri->id}.y2016", $ri->y2016 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2017 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2017]"
                                                           value="{{ old("region_investments.{$ri->id}.y2017", $ri->y2017 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2018 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2018]"
                                                           value="{{ old("region_investments.{$ri->id}.y2018", $ri->y2018 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2019 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2019]"
                                                           value="{{ old("region_investments.{$ri->id}.y2019", $ri->y2019 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2020 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2020]"
                                                           value="{{ old("region_investments.{$ri->id}.y2020", $ri->y2020 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2021 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2021]"
                                                           value="{{ old("region_investments.{$ri->id}.y2021", $ri->y2021 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2022 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2022]"
                                                           value="{{ old("region_investments.{$ri->id}.y2022", $ri->y2022 ?? 0) }}">
                                                </td>
                                                <td><input type="text"
                                                           class="region_investments money region_investments_2023 region_investments_{{$ri->region_id}} form-control money text-right"
                                                           name="region_investments[{{$ri->id}}][y2023]"
                                                           value="{{ old("region_investments.{$ri->id}.y2023", $ri->y2023 ?? 0) }}">
                                                </td>
                                                <td><input type="text" class="form-control money text-right"
                                                           id="region_investments_{{$ri->region_id}}_total" readonly></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2016_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2017_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2018_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2019_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2020_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2021_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2022_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_2023_total" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control money text-right"
                                                       id="region_investments_total" readonly>
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/. Regional Breakdown -->

                        <!-- Financial Status -->
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">{{ __("Financial Status") }}</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table-responsive">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-sm text-center">2016 &amp; Prior</th>
                                            <th class="text-sm text-center">2017</th>
                                            <th class="text-sm text-center">2018</th>
                                            <th class="text-sm text-center">2019</th>
                                            <th class="text-sm text-center">2020</th>
                                            <th class="text-sm text-center">2021</th>
                                            <th class="text-sm text-center">2022</th>
                                            <th class="text-sm text-center">2023 &amp; Beyond</th>
                                            <th class="text-sm text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th class="text-sm">National Expenditure Program (NEP)</th>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2016]"
                                                       value="{{ old("nep.y2016", $project->nep->y2016 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2017]"
                                                       value="{{ old("nep.y2017", $project->nep->y2017 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2018]"
                                                       value="{{ old("nep.y2018", $project->nep->y2018 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2019]"
                                                       value="{{ old("nep.y2019", $project->nep->y2019 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2020]"
                                                       value="{{ old("nep.y2020", $project->nep->y2020 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2021]"
                                                       value="{{ old("nep.y2021", $project->nep->y2021 ?? 0) }}"></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2022]"
                                                       value="{{ old("nep.y2022", $project->nep->y2022 ?? 0) }}"
                                                       readonly></td>
                                            <td><input type="text" class="nep money form-control text-right"
                                                       name="nep[y2023]"
                                                       value="{{ old("nep.y2023", $project->nep->y2023 ?? 0) }}"
                                                       readonly></td>
                                            <td><input type="text" class="form-control text-right" id="nep_total" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm">General Appropriations Act (GAA)</th>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2016]"
                                                       value="{{ old("allocation.y2016", $project->allocation->y2016 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2017]"
                                                       value="{{ old("allocation.y2017", $project->allocation->y2017 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2018]"
                                                       value="{{ old("allocation.y2018", $project->allocation->y2018 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2019]"
                                                       value="{{ old("allocation.y2019", $project->allocation->y2019 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2020]"
                                                       value="{{ old("allocation.y2020", $project->allocation->y2020 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2021]"
                                                       value="{{ old("allocation.y2021", $project->allocation->y2021 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2022]"
                                                       value="{{ old("allocation.y2022", $project->allocation->y2022 ?? 0) }}"
                                                       readonly>
                                            </td>
                                            <td><input type="text" class="allocation money form-control text-right"
                                                       name="allocation[y2023]"
                                                       value="{{ old("allocation.y2023", $project->allocation->y2023 ?? 0) }}"
                                                       readonly>
                                            </td>
                                            <td><input type="text" class="form-control text-right" id="allocation_total"
                                                       readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-sm">Actual Disbursement</th>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2016]"
                                                       value="{{ old("disbursement.y2016", $project->disbursement->y2016 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2017]"
                                                       value="{{ old("disbursement.y2017", $project->disbursement->y2017 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2018]"
                                                       value="{{ old("disbursement.y2018", $project->disbursement->y2018 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2019]"
                                                       value="{{ old("disbursement.y2019", $project->disbursement->y2019 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2020]"
                                                       value="{{ old("disbursement.y2020", $project->disbursement->y2020 ?? 0) }}">
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2021]"
                                                       value="{{ old("disbursement.y2021", $project->disbursement->y2021 ?? 0) }}"
                                                       readonly>
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2022]"
                                                       value="{{ old("disbursement.y2022", $project->disbursement->y2022 ?? 0) }}"
                                                       readonly>
                                            </td>
                                            <td><input type="text" class="disbursement money form-control text-right"
                                                       name="disbursement[y2023]"
                                                       value="{{ old("disbursement.y2023", $project->disbursement->y2023 ?? 0) }}"
                                                       readonly>
                                            </td>
                                            <td><input type="text" class="money form-control text-right"
                                                       id="disbursement_total" readonly></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/. Financial Status -->
                    </div>

                </div>
            </div>

            <div class="Box-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection

@include('projects.partials.script')

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#expected_outputs' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#updates' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
