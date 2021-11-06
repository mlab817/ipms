@extends('layouts.app')

@section('page-header')
    <x-page-header :header="$project->title"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header clearfix d-flex flex-items-center py-2 pr-2 position-sticky top-0">
            <div class="d-flex flex-auto flex-items-center">
                <details class="dropdown details-reset details-overlay d-inline-block">
                    <summary class="color-fg-muted p-2 d-inline btn btn-octicon mr-2 m-0 p-2" aria-haspopup="true">
                        <svg class="octicon octicon-list-unordered" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2 4a1 1 0 100-2 1 1 0 000 2zm3.75-1.5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zm0 5a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5zM3 8a1 1 0 11-2 0 1 1 0 012 0zm-1 6a1 1 0 100-2 1 1 0 000 2z"></path></svg>
                    </summary>

                    <ul class="dropdown-menu dropdown-menu-e">
                        <li><a class="dropdown-item" href="#general-information">General Information</a></li>
                        <li><a class="dropdown-item" href="#implementing-agencies">Implementing Agencies</a></li>
                        <li><a class="dropdown-item" href="#spatial-coverage">Spatial Coverage</a></li>
                        <li><a class="dropdown-item" href="#approval-level">Level of Approval</a></li>
                        <li><a class="dropdown-item" href="#programming-document">Project for Inclusion in Which Programming Document</a></li>
                        <li><a class="dropdown-item" href="#physical-and-financial-status">Physical and Financial Status</a></li>
                        <li><a class="dropdown-item" href="#implementation-period">Implementation Period</a></li>
                        <li><a class="dropdown-item" href="#pdp">Philippine Development Plan</a></li>
                        <li><a class="dropdown-item" href="#trip-information">TRIP Information</a></li>
                        <li><a class="dropdown-item" href="#sdgs">Sustainable Development Goals</a></li>
                        <li><a class="dropdown-item" href="#gad-responsiveness">Level of GAD Responsiveness</a></li>
                        <li><a class="dropdown-item" href="#ten-point-agenda">Ten Point Agenda</a></li>
                        <li><a class="dropdown-item" href="#project-preparation-details">Project Preparation Details</a></li>
                        <li><a class="dropdown-item" href="#preconstruction-costs">Pre-construction Costs</a></li>
                        <li><a class="dropdown-item" href="#employment-generation">Employment Generation</a></li>
                        <li><a class="dropdown-item" href="#funding-source">Funding Source and Mode of Implementation</a></li>
                        <li><a class="dropdown-item" href="#project-costs">Project Costs</a></li>
                        <li><a class="dropdown-item" href="#financial-accomplishments">Financial Accomplishments</a></li>
                    </ul>
                </details>

                <h2 class="Box-title overflow-hidden pr-3">
                    <a href="{{ route('projects.show', $project) }}" class="Link tooltipped tooltipped-n" aria-label="Go back to view project and exit edit mode">
                        {{ $project->title }}
                    </a>
                </h2>
            </div>

            <div class="float-right">
{{--                <button type="submit" form="editProjectForm" class="btn btn-primary" name="immediate" value="1">Save Immediately</button>--}}
                <button type="submit" form="editProjectForm" class="btn btn-primary">Save</button>
            </div>
        </div>

        @if(config('queue.default') == 'database')
            <div class="d-flex flash flash-full flash-error">
                <div class="d-flex flex-auto flex-items-center">
                    <pre>!! Warning: Saving PAP information is queued. Changes may take some time to reflect. !!</pre>
                </div>
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary aria-haspopup="true" class="btn btn-danger btn-sm flash-action">
                        Learn more
                    </summary>
                    <details-dialog class="Box--overlay d-flex flex-column anim-fade-in fast">
                        <div class="Box">
                            <div class="Box-header">
                                <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                    <!-- <%= octicon "x" %> -->
                                    <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                </button>

                                <h3 class="Box-title">
                                    Queueing
                                </h3>
                            </div>
                            <div class="Box-body">
                                <p>
                                    <strong>TL;DR: "Heavy" tasks run in the background to ensure better user experience.</strong>
                                </p>
                                <p>To speed up the system, tasks that may take a long time to execute
                                    do not run right away. Instead, the system queues them and runs them
                                    at a specific time. This should not take too long provided there
                                    aren't many tasks.
                                </p>
                                <p>Under the hood, the "update" PAP operation updates
                                    the PAP information and updates other related data
                                    that may take some time to execute. It also checks
                                    for issues. This scheme also prevents the operation
                                    from breaking (i.e. not being able to save some of
                                    the information inputted).
                                </p>
                                <p class="note">
                                    If you don't like this feature, you may request IPD
                                    to disable it.
                                </p>
                            </div>
                        </div>
                    </details-dialog>
                </details>
            </div>
        @endif

        <form action="{{ route('projects.update', $project) }}" method="POST" id="editProjectForm">
            @csrf
            @method('PUT')

            <div class="Box-body">

{{--                @env('local')--}}
                    @if($errors->any())
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    @endif
{{--                @endenv--}}

                <x-subhead subhead="General Information" id="general-information"></x-subhead>

                <dl class="form-group @error('title') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="title" class="required">Title </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.text name="title" value="{{ old('title', $project->title) }}" aria-describedby="title-validation"></x-input.text>
                        <x-error-message name="title" id="title-validation"></x-error-message>
                        <p class="note">PAP title must be unique.</p>
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

                <dl class="form-group @error('total_project_cost') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="total_project_cost" class="required">Total Project Cost (in PhP) </label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" class="form-control money" name="total_project_cost" value="{{ old('total_project_cost', $project->total_project_cost ?? 0) }}">
                        <x-error-message name="total_project_cost" id="total_project_cost-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Implementing Agencies" id="implementing-agencies"></x-subhead>

                <dl class="form-group @error('office_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="office_id" class="required">Office </label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="hidden" name="office_id" value="{{ old('office_id', $project->office_id) }}">
                        <x-select disabled name="office_id" :options="$offices" :selected="old('office_id', $project->office_id)" aria-describedby="office-id-validation"></x-select>
                        <p class="note">Office depends on the current user's office assignment.</p>
                    </dd>
                </dl>

                <dl class="form-group @error('operating_units') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="operating_units" class="required">Operating Units </label>
                    </dt>
                    <dd class="form-group-body">
                        @foreach($ou_types as $ou_type)
                            <label for="">{{ $ou_type->name }}</label>
                            <div class="ml-4">
                                <x-input.checkbox :options="$ou_type->operating_units" name="operating_units[]" :selected="old('operating_units', $project->operating_units->pluck('id')->toArray() ?? [])" aria-describedby="operating-units-validation"></x-input.checkbox>
                            </div>
                        @endforeach
                        <x-error-message name="operating_units[]" id="operating-units-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Spatial Coverage" id="spatial-coverage"></x-subhead>

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

                <x-subhead subhead="Level of Approval" id="approval-level"></x-subhead>

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

                <x-subhead subhead="Project for Inclusion in Which Programming Document" id="programming-document"></x-subhead>

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
                        <label for="covid_interventions">Included in the following documents: </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.checkbox :options="$covid_interventions" name="covid_interventions[]" :selected="old('covid_interventions', $project->covid_interventions->pluck('id')->toArray() ?? [])" aria-describedby="covid-interventions-validation"></x-input.checkbox>
                        <x-error-message name="covid_interventions[]" id="covid-interventions-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('rdip') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="rdip" class="required">Is this PAP included in the Regional Development Investment Program? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="rdip" selected="{{ old('rdip', $project->rdip) }}" aria-describedby="rdip-validation"></x-input.radio>
                        <x-error-message name="rdip" id="rdip-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group ml-4 @error('rdc_endorsement_required') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="rdc_endorsement_required">Will require Regional Development Council (RDC) Endorsement? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="rdc_endorsement_required" selected="{{ old('rdc_endorsement_required', $project->rdc_endorsement_required) }}" aria-describedby="rdc_endorsement_required-validation"></x-input.radio>
                        <x-error-message name="rdc_endorsement_required" id="rdc_endorsement_required-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group ml-4 @error('rdc_endorsed') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="rdc_endorsed">Already endorsed by RDC? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="rdc_endorsed" selected="{{ old('rdc_endorsed', $project->rdc_endorsed) }}" aria-describedby="rdc_endorsed-validation"></x-input.radio>
                        <x-error-message name="rdc_endorsed" id="rdc_endorsed-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group ml-4 @error('rdc_endorsed_date') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="rdc_endorsed_date">
                            Date of Endorsement
                        </label>
                    </dt>
                    <dd class="form-group-body">
                        <input id="rdc_endorsed_date" name="rdc_endorsed_date" type="date" class="form-control" aria-describedby="ardc_endorseddate-validation" value="{{ old('rdc_endorsed_date', $project->rdc_endorsed_date) }}">
                        <x-error-message name="rdc_endorsed_date" id="rdc_endorsed-date-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Physical and Financial Status" id="physical-and-financial-status"></x-subhead>

                <div x-data="{
                    ref_project_status_id:  {{ old('ref_project_status_id', $project->ref_project_status_id ?? 0) }}
                }">
                    <dl class="form-group @error('ref_project_status_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_project_status_id" class="required">Status of Implementation Readiness </label>
                        </dt>
                        <dd class="form-group-body">
                            <select class="form-select" id="ref_project_status_id" x-model="ref_project_status_id" name="ref_project_status_id" aria-describedby="project-status-validation">
                                <option value="">Select Option</option>
                                @foreach($project_statuses as $option)
                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                @endforeach
                            </select>
                            <x-error-message name="ref_project_status_id" id="project-status-validation"></x-error-message>
                            <p class="note" x-show="ref_project_status_id == 4">
                                Indicate reason for dropping in the updates field.
                            </p>
                        </dd>
                    </dl>

                    <div class="ml-4" x-cloak x-show="ref_project_status_id">
                        <dl x-show="ref_project_status_id == 1" class="form-group @error('icc_resubmission') errored mb-6 @enderror">
                            <dt class="form-group-header">
                                <label for="icc_resubmission" class="required">Will this require resubmission to the ICC? (If ongoing) </label>
                            </dt>
                            <dd class="form-group-body">
                                <x-input.radio :options="$boolean" name="icc_resubmission" selected="{{ old('icc_resubmission', $project->icc_resubmission) }}" aria-describedby="icc_resubmission-validation"></x-input.radio>
                                <x-error-message name="icc_resubmission" id="rdc_endorsed-validation"></x-error-message>
                            </dd>
                        </dl>

                        <dl x-show="ref_project_status_id == 2" class="form-group @error('ref_readiness_level_id') errored mb-6 @enderror">
                            <dt class="form-group-header">
                                <label for="ref_readiness_level_id">
                                    Level of Readiness (If proposed)
                                </label>
                            </dt>
                            <dd class="form-group-body">
                                <x-select :options="$readiness_levels" name="ref_readiness_level_id" aria-describedby="readiness-level-validation" :selected="old('ref_readiness_level_id', $project->ref_readiness_level_id)"></x-select>
                                <x-error-message name="ref_readiness_level_id" id="readiness-level-validation"></x-error-message>
                            </dd>
                        </dl>

                        <dl x-show="ref_project_status_id == 3" class="form-group @error('completion_date') errored mb-6 @enderror">
                            <dt class="form-group-header">
                                <label for="completion_date">Date of Completion  (If completed) </label>
                            </dt>
                            <dd class="form-group-body">
                                <input type="date" class="form-control" name="completion_date" value="{{ old('completion_date', $project->completion_date) }}" aria-describedby="completion-date-validation">
                                <x-error-message name="completion_date" id="completion-date-validation"></x-error-message>
                            </dd>
                        </dl>
                    </div>
                </div>

                <dl class="form-group @error('updates') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="updates" class="required">Updates </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-textarea name="updates" :value="old('updates', $project->project_update->updates ?? '')"></x-textarea>
                        <x-error-message name="updates" id="updates-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('updates_date') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="updates_date" class="required">
                            As of
                        </label>
                    </dt>
                    <dd class="form-group-body">
                        <input id="updates_date" name="updates_date" type="date" class="form-control" aria-describedby="updates-date-validation" value="{{ old('updates_date', $project->project_update->updates_date) }}">
                        <x-error-message name="updates_date" id="updates-date-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Implementation Period" id="implementation-period"></x-subhead>

                <dl class="form-group @error('target_start_year') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="target_start_year" class="required">Start of Project Implementation </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="target_start_year" :options="$years" :selected="old('target_start_year', $project->target_start_year ?? '')" aria-describedby="target-start-year-validation"></x-select>
                        <x-error-message name="target_start_year" id="target-start-year-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('target_end_year') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="target_start_year" class="required">Year of Project Completion </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="target_end_year" :options="$years" :selected="old('target_end_year', $project->target_end_year ?? '')" aria-describedby="target-end-year-validation"></x-select>
                        <x-error-message name="target_end_year" id="target-end-year-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Philippine Development Plan (PDP) Chapter" id="pdp"></x-subhead>

                <!-- TODO: Add TRIP indicators -->

                <div x-data="{
                        pdpChapterId: '{{ $project->ref_pdp_chapter_id }}',
                        options: [],
                        pdp_indicators: @json($project->pdp_indicators->pluck('id')->toArray() ?? []),
                        loadPdpIndicators() {
                            if (this.pdpChapterId) {
                                let url = '{{ route('api.pdp_chapters', ['id' => ':id']) }}';
                                url = url.replace(':id', this.pdpChapterId);
                                axios.get(url)
                                    .then(res => {
                                        this.options = res.data;
                                    });
                            }
                        }
                    }" x-init="loadPdpIndicators()">
                    <dl class="form-group @error('ref_pdp_chapter_id') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="ref_pdp_chapter_id" class="required">Main PDP Midterm Update Chapter </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select x-on:change="loadPdpIndicators" x-model="pdpChapterId" name="ref_pdp_chapter_id" :options="$pdp_chapters" :selected="old('ref_pdp_chapter_id', $project->ref_pdp_chapter_id ?? '')" aria-describedby="ref_pdp_chapter_id-validation"></x-select>
                            <x-error-message name="ref_pdp_chapter_id" id="ref_pdp_chapter_id-validation"></x-error-message>
                        </dd>
                    </dl>

                    <dl class="form-group @error('pdp_chapters') errored mb-6 @enderror">
                        <dt class="form-group-header">
                            <label for="pdp_chapters">Other PDP Midterm Update Chapters </label>
                        </dt>
                        <dd class="form-group-body">
                            <x-input.checkbox :options="$pdp_chapters" name="pdp_chapters[]" :selected="old('pdp_chapters', $project->pdp_chapters->pluck('id')->toArray() ?? [])" aria-describedby="pdp_chapters-validation"></x-input.checkbox>
                            <x-error-message name="pdp_chapters[]" id="pdp_chapters-validation"></x-error-message>
                        </dd>
                    </dl>

                    <x-subhead subhead="Main PDP Chapter Outcome Statements/Outputs"></x-subhead>

                    <dl>
                        <dt>
                            <label>Main PDP Chapter Outcome Statements/Outputs</label>
                        </dt>
                        <dd>
                            <template x-for="indicator in options.children" :key="indicator.id">
                                <div>
                                    <div class="form-checkbox my-0">
                                        <label :for="`pdp_indicator_${indicator.id}`">
                                            <input type="checkbox" name="pdp_indicators[]" x-model="pdp_indicators" :id="`pdp_indicator_${indicator.id}`" :value="indicator.id">
                                            <span x-text="indicator.name"></span>
                                        </label>
                                    </div>
                                    <template x-for="child1 in indicator.children" :key="child1.id">
                                        <div class="ml-4">
                                            <div class="form-checkbox my-0">
                                                <label :for="`pdp_indicator_${child1.id}`">
                                                    <input type="checkbox" name="pdp_indicators[]" x-model="pdp_indicators" :id="`pdp_indicator_${child1.id}`" :value="child1.id">
                                                    <span x-text="child1.name"></span>
                                                </label>
                                            </div>
                                            <template x-for="child2 in child1.children" :key="child2.id">
                                                <div class="ml-4">
                                                    <div class="form-checkbox my-0">
                                                        <label :for="`pdp_indicator_${child2.id}`">
                                                            <input type="checkbox" name="pdp_indicators[]" x-model="pdp_indicators" :id="`pdp_indicator_${child2.id}`" :value="child2.id">
                                                            <span x-text="child2.name"></span>
                                                        </label>
                                                    </div>

                                                    <template x-for="child3 in child2.children" :key="child3.id">
                                                        <div class="ml-4">
                                                            <div class="form-checkbox my-0">
                                                                <label :for="`pdp_indicator_${child3.id}`">
                                                                    <input type="checkbox" name="pdp_indicators[]" x-model="pdp_indicators" :id="`pdp_indicator_${child3.id}`" :value="child3.id">
                                                                    <span x-text="child3.name"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </dd>
                    </dl>

                </div>

                <div class="Box">

                    <div class="Box-header">
                        <h2 class="Box-title" id="trip-information">TRIP Information</h2>
                    </div>

                    <div class="Box-body">

                        <dl class="form-group">
                            <dt class="form-group-header">
                                <label for="" class="required">Infrastructure Sectors</label>
                            </dt>
                            <dd class="form-group-body">
                                @foreach ($infrastructure_sectors as $key => $is)
                                    <div class="form-checkbox my-0">
                                        <label for="">
                                            <input type="checkbox" value="{{ $is->id }}" name="infrastructure_sectors[]"
                                                   @if(in_array($is->id, old('infrastructure_sectors', $project->infrastructure_sectors->pluck('id')->toArray()))) checked @endif>
                                            {{ $is->name }}
                                        </label>
                                        @if ($is->infrastructure_subsectors)
                                            @foreach($is->infrastructure_subsectors as $key => $iss)
                                                <div class="form-checkbox my-0">
                                                    <label for="">
                                                        <input type="checkbox" value="{{ $iss->id }}" name="infrastructure_subsectors[]"
                                                               @if(in_array($is->id, old('infrastructure_sectors', $project->infrastructure_subsectors->pluck('id')->toArray()))) checked @endif>
                                                        {{ $iss->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </dd>
                        </dl>

                        <dl class="form-group">
                            <dt class="form-group-header">
                                <label for="" class="required">Status of Implementation Readiness</label>
                            </dt>
                            <dd class="form-group-body">
                                <x-input.checkbox :options="$prerequisites" name="prerequisites[]" :selected="old('prerequisites', $project->prerequisites->pluck('id')->toArray() ?? [])"></x-input.checkbox>
                            </dd>
                        </dl>

                        <dl class="form-group">
                            <dt class="form-group-header">
                                <label for="risk">Implementation Risks and Mitigation Strategies</label>
                            </dt>
                            <dd class="form-group-body">
                                <x-textarea name="risk" value="{{ old('risk', $project->risk->risk ?? '') }}"></x-textarea>
                            </dd>
                        </dl>

                        <dl class="form-group">
                            <dt class="form-group-header">
                                <label for="">Infrastructure Cost by Funding Source (in absolute PhP)</label>
                            </dt>
                            <dd class="form-group-body">
                                <table class="col-12 d-table">
                                    <thead>
                                    <tr class="border-top border-bottom">
                                        <th class="col-1 p-1">Financing Source</th>
                                        <th class="col-1 p-1 text-center">2022 *</th>
                                        <th class="col-1 p-1 text-center">2023</th>
                                        <th class="col-1 p-1 text-center">2024</th>
                                        <th class="col-1 p-1 text-center">2025</th>
                                        <th class="col-1 p-1 text-center">2026 &amp; Beyond</th>
                                        <th class="col-1 p-1 text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($project->fs_infrastructures as $key => $fs)
                                        <tr class="border-bottom">
                                            <th class="p-1 text-left">
                                                <input type="hidden" name="fs_infrastructures[{{ $key }}][ref_funding_source_id]"
                                                       value="{{ old("fs_infrastructures.{$key}.ref_funding_source_id", $fs->ref_funding_source_id ?? 0) }}">
                                                {{ $fs->funding_source->name }}
                                            </th>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="fs_infrastructures fs_infrastructures_2022 fs_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="fs_infrastructures[{{$key}}][y2022]"
                                                       value="{{ old("fs_infrastructures.{$key}.y2022", $fs->y2022 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="fs_infrastructures fs_infrastructures_2023 fs_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="fs_infrastructures[{{$key}}][y2023]"
                                                       value="{{ old("fs_infrastructures.{$key}.y2023", $fs->y2023 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="fs_infrastructures fs_infrastructures_2024 fs_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="fs_infrastructures[{{$key}}][y2024]"
                                                       value="{{ old("fs_infrastructures.{$key}.y2024", $fs->y2024 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="fs_infrastructures fs_infrastructures_2025 fs_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="fs_infrastructures[{{$key}}][y2025]"
                                                       value="{{ old("fs_infrastructures.{$key}.y2025", $fs->y2025 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="fs_infrastructures fs_infrastructures_2026 fs_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="fs_infrastructures[{{$key}}][y2026]"
                                                       value="{{ old("fs_infrastructures.{$key}.y2026", $fs->y2026 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text" class="form-control text-right  width-full"
                                                       id="fs_infrastructures_{{$key}}_total" disabled>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="border-bottom">
                                        <th class="p-1">Total</th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="fs_infrastructures_2022_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="fs_infrastructures_2023_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="fs_infrastructures_2024_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="fs_infrastructures_2025_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="fs_infrastructures_2026_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control text-right width-full" id="fs_infrastructures_total"
                                                   readonly>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <p class="note">* Based on NEP</p>
                            </dd>
                        </dl>

                        <dl class="form-group">
                            <dt class="form-group-header">
                                <label for="">Infrastructure Cost by Region (in absolute PhP)</label>
                            </dt>
                            <dd class="form-group-body">
                                <table class="col-12 d-table">
                                    <thead>
                                    <tr class="border-top border-bottom">
                                        <th class="col-1 p-1">Region</th>
                                        <th class="col-1 p-1 text-center">2022 *</th>
                                        <th class="col-1 p-1 text-center">2023</th>
                                        <th class="col-1 p-1 text-center">2024</th>
                                        <th class="col-1 p-1 text-center">2025</th>
                                        <th class="col-1 p-1 text-center">2026 &amp; Beyond</th>
                                        <th class="col-1 p-1 text-center">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($project->region_infrastructures->sortby('region.order') as $key => $fs)
                                        <tr class="border-bottom">
                                            <th class="p-1 text-left">
                                                <input type="hidden" name="region_infrastructures[{{ $key }}][ref_region_id]"
                                                       value="{{ old("region_infrastructures.{$key}.ref_region_id", $fs->ref_region_id ?? 0) }}">
                                                {{ $fs->region->label }}
                                            </th>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="region_infrastructures region_infrastructures_2022 region_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="region_infrastructures[{{$key}}][y2022]"
                                                       value="{{ old("region_infrastructures.{$key}.y2022", $fs->y2022 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="region_infrastructures region_infrastructures_2023 region_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="region_infrastructures[{{$key}}][y2023]"
                                                       value="{{ old("region_infrastructures.{$key}.y2023", $fs->y2023 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="region_infrastructures region_infrastructures_2024 region_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="region_infrastructures[{{$key}}][y2024]"
                                                       value="{{ old("region_infrastructures.{$key}.y2024", $fs->y2024 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="region_infrastructures region_infrastructures_2025 region_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="region_infrastructures[{{$key}}][y2025]"
                                                       value="{{ old("region_infrastructures.{$key}.y2025", $fs->y2025 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text"
                                                       class="region_infrastructures region_infrastructures_2026 region_infrastructures_{{$key}} money form-control text-right width-full"
                                                       name="region_infrastructures[{{$key}}][y2026]"
                                                       value="{{ old("region_infrastructures.{$key}.y2026", $fs->y2026 ?? 0) }}">
                                            </td>
                                            <td class="p-1">
                                                <input type="text" class="form-control text-right  width-full"
                                                       id="region_infrastructures_{{$key}}_total" disabled>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr class="border-bottom">
                                        <th class="p-1">Total</th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="region_infrastructures_2022_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="region_infrastructures_2023_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="region_infrastructures_2024_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="region_infrastructures_2025_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control money text-right width-full"
                                                   id="region_infrastructures_2026_total" readonly>
                                        </th>
                                        <th class="p-1">
                                            <input type="text" class="form-control text-right width-full" id="region_infrastructures_total"
                                                   readonly>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>

                                <p class="note">* Based on NEP</p>
                            </dd>
                        </dl>

                    </div>

                </div>

                <dl class="form-group @error('expected_outputs') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="expected_outputs" class="required">Expected Outputs </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-textarea name="expected_outputs" :value="old('expected_outputs', $project->expected_output->expected_outputs ?? '')"></x-textarea>
                        <x-error-message name="expected_outputs" id="expected_outputs-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="0-10 Point Socioeconomic Agenda" id="ten-point-agenda"></x-subhead>

                <dl class="form-group @error('ten_point_agendas') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ten_point_agendas">0-10 Point Socioeconomic Agenda </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.checkbox :options="$ten_point_agendas" name="ten_point_agendas[]" :selected="old('ten_point_agendas', $project->ten_point_agendas->pluck('id')->toArray() ?? [])" aria-describedby="ten_point_agendas-validation"></x-input.checkbox>
                        <x-error-message name="ten_point_agendas[]" id="ten_point_agendas-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Sustainable Development Goals (SDG)" id="sdgs"></x-subhead>

                <dl class="form-group @error('sdgs') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="sdgs">Sustainable Development Goals (SDG) </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.checkbox :options="$sdgs" name="sdgs[]" :selected="old('sdgs', $project->sdgs->pluck('id')->toArray() ?? [])" aria-describedby="sdgs-validation"></x-input.checkbox>
                        <x-error-message name="sdgs[]" id="sdgs-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Level of GAD Responsiveness" id="gad-responsiveness"></x-subhead>

                <dl class="form-group @error('ref_gad_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_gad_id">Level of GAD Responsiveness (if ICC-able) </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="ref_gad_id" :options="$gads" :selected="old('ref_gad_id', $project->ref_gad_id ?? '')" aria-describedby="ref_preparation_document_id-validation"></x-select>
                        <x-error-message name="ref_gad_id" id="ref_gad_id-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Project Preparation Details" id="project-preparation-details"></x-subhead>

                <dl class="form-group @error('ref_preparation_document_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_preparation_document_id" class="required">Project Preparation Document </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="ref_preparation_document_id" :options="$preparation_documents" :selected="old('ref_preparation_document_id', $project->ref_preparation_document_id ?? '')" aria-describedby="ref_preparation_document_id-validation"></x-select>
                        <x-error-message name="ref_preparation_document_id" id="ref_preparation_document_id-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('feasibility_study.needs_assistance') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="feasibility_study.needs_assistance">Will require assistance for the conduct of Feasibility Study? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio name="feasibility_study[needs_assistance]" :options="$boolean" selected="{{ old('feasibility_study.needs_assistance', $project->feasibility_study->needs_assistance) }}" aria-describedby="need-assistance-validation"></x-input.radio>
                        <x-error-message name="feasibility_study.needs_assistance" id="needs_assistance-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('feasibility_study.ref_fs_status_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_fs_status_id">Status of Feasibility
                            Study (Only if FS is required)</label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select :options="$fs_statuses" :selected="old('feasibility_study.ref_fs_status_id', $project->feasibility_study->ref_fs_status_id ?? '')" name="feasibility_study[ref_fs_status_id]" id="ref_fs_status_id" aria-describedby="fs-status-validation"></x-select>
                        <x-error-message name="feasibility_study[ref_fs_status_id]" id="fs-status-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="fs_cost">Schedule of Feasibility Study Cost (in absolute PhP)</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table" id="fs_cost">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">2017</th>
                                <th class="col-1 text-center">2018</th>
                                <th class="col-1 text-center">2019</th>
                                <th class="col-1 text-center">2020</th>
                                <th class="col-1 text-center">2021</th>
                                <th class="col-1 text-center">2022</th>
                                <th class="col-1 text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2017]"
                                           value="{{ old('feasibility_study.y2017', $project->feasibility_study->y2017 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2018]"
                                           value="{{ old('feasibility_study.y2018', $project->feasibility_study->y2018 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2019]"
                                           value="{{ old('feasibility_study.y2019', $project->feasibility_study->y2019 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2020]"
                                           value="{{ old('feasibility_study.y2020', $project->feasibility_study->y2020 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2021]"
                                           value="{{ old('feasibility_study.y2021', $project->feasibility_study->y2021 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money feasibility_study form-control text-right width-full"
                                           name="feasibility_study[y2022]"
                                           value="{{ old('feasibility_study.y2022', $project->feasibility_study->y2022 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money form-control text-right width-full" id="feasibility_study_total"
                                           disabled>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="completion_date">Expected/Target
                            Date of Completion of FS</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="date" class="form-control"
                               name="feasibility_study[completion_date]"
                               value="{{ old('feasibility_study.completion_date', $project->feasibility_study->completion_date ?? '') }}">
                    </dd>
                </dl>

                <x-subhead subhead="Pre-Construction Costs" id="preconstruction-costs"></x-subhead>

                <dl class="form-group @error('has_row') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="has_row">With ROWA Component? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="has_row" selected="{{ old('has_row', $project->has_row) }}" aria-describedby="has-row-validation"></x-input.radio>
                        <x-error-message name="has_row" id="has-row-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="row_cost">Schedule of ROWA Cost (in absolute PhP)</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table" id="row_cost">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">2017</th>
                                <th class="col-1 text-center">2018</th>
                                <th class="col-1 text-center">2019</th>
                                <th class="col-1 text-center">2020</th>
                                <th class="col-1 text-center">2021</th>
                                <th class="col-1 text-center">2022</th>
                                <th class="col-1 text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2017]"
                                           value="{{ old('right_of_way.y2017', $project->right_of_way->y2017 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2018]"
                                           value="{{ old('right_of_way.y2018', $project->right_of_way->y2018 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2019]"
                                           value="{{ old('right_of_way.y2019', $project->right_of_way->y2019 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2020]"
                                           value="{{ old('right_of_way.y2020', $project->right_of_way->y2020 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2021]"
                                           value="{{ old('right_of_way.y2021', $project->right_of_way->y2021 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money right_of_way form-control text-right width-full"
                                           name="right_of_way[y2022]"
                                           value="{{ old('right_of_way.y2022', $project->right_of_way->y2022 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money form-control text-right width-full" id="right_of_way_total"
                                           disabled>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt>
                        <label for="">Affected households</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control" name="right_of_way[affected_households]"
                            value="{{ old('right_of_way.affected_households', $project->right_of_way->affected_households) }}">
                    </dd>
                </dl>

                <div class="border-bottom"></div>

                <dl class="form-group @error('has_row') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="has_rap">With Resettlement Component? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="has_rap" selected="{{ old('has_rap', $project->has_rap) }}" aria-describedby="has-rap-validation"></x-input.radio>
                        <x-error-message name="has_rap" id="has-rap-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="rap_cost">Schedule of Resettlement Cost (in absolute PhP)</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table" id="rap_cost">
                            <thead>
                            <tr>
                                <th class="col-1 text-center">2017</th>
                                <th class="col-1 text-center">2018</th>
                                <th class="col-1 text-center">2019</th>
                                <th class="col-1 text-center">2020</th>
                                <th class="col-1 text-center">2021</th>
                                <th class="col-1 text-center">2022</th>
                                <th class="col-1 text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2017]"
                                           value="{{ old('resettlement_action_plan.y2017', $project->resettlement_action_plan->y2017 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2018]"
                                           value="{{ old('resettlement_action_plan.y2018', $project->resettlement_action_plan->y2018 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2019]"
                                           value="{{ old('resettlement_action_plan.y2019', $project->resettlement_action_plan->y2019 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2020]"
                                           value="{{ old('resettlement_action_plan.y2020', $project->resettlement_action_plan->y2020 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2021]"
                                           value="{{ old('resettlement_action_plan.y2021', $project->resettlement_action_plan->y2021 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money resettlement_action_plan form-control text-right width-full"
                                           name="resettlement_action_plan[y2022]"
                                           value="{{ old('resettlement_action_plan.y2022', $project->resettlement_action_plan->y2022 ?? 0) }}">
                                </td>
                                <td class="p-1">
                                    <input type="text" class="money form-control text-right width-full" id="resettlement_action_plan_total"
                                           disabled>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt>
                        <label for="">Affected households</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control" name="resettlement_action_plan[affected_households]"
                               value="{{ old('resettlement_action_plan.affected_households', $project->resettlement_action_plan->affected_households) }}">
                    </dd>
                </dl>

                <div class="border-bottom"></div>

                <dl class="form-group @error('has_row_rap') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="has_row_rap">With Right of Way and Resettlement Component? </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.radio :options="$boolean" name="has_row_rap" selected="{{ old('has_row_rap', $project->has_row_rap) }}" aria-describedby="has-row-rap-validation"></x-input.radio>
                        <x-error-message name="has_row_rap" id="has-row-rap-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Employment Generation" id="employment-generation"></x-subhead>

                <dl class="form-group">
                    <dt>
                        <label for="">No. of persons to be employed:</label>
                    </dt>
                    <dd>
                        <input type="number" class="form-control" name="employment_generated"
                               value="{{ old('employment_generated', $project->employment_generated ?? 0) }}">
                    </dd>
                </dl>

                <x-subhead subhead="Funding Source and Mode of Implementation" id="funding-source"></x-subhead>

                <dl class="form-group @error('ref_funding_source_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_funding_source_id" class="required">Main Funding Source </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select :options="$funding_sources" name="ref_funding_source_id" selected="{{ old('ref_funding_source_id', $project->ref_funding_source_id) }}" aria-describedby="ref_funding_source_id-validation"></x-select>
                        <x-error-message name="ref_funding_source_id" id="ref_funding_source_id-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('ref_funding_institution_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_funding_institution_id" class="required">ODA Funding Institution </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select :options="$funding_institutions" name="ref_funding_institution_id" selected="{{ old('ref_funding_institution_id', $project->ref_funding_institution_id) }}" aria-describedby="ref_funding_institution_id-validation"></x-select>
                        <x-error-message name="ref_funding_institution_id" id="ref_funding_institution_id-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('ref_implementation_mode_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_implementation_mode_id" class="required">Mode of Implementation </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select :options="$implementation_modes" name="ref_implementation_mode_id" selected="{{ old('ref_implementation_mode_id', $project->ref_implementation_mode_id) }}" aria-describedby="ref_implementation_mode_id-validation"></x-select>
                        <x-error-message name="ref_implementation_mode_id" id="ref_implementation_mode_id-validation"></x-error-message>
                    </dd>
                </dl>

                <x-subhead subhead="Project Costs" id="project-costs"></x-subhead>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="">Investment Requirements by Funding Source  (in absolute PhP)</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table">
                            <thead>
                                <tr class="border-top border-bottom">
                                    <th class="col-1 p-1">Financing Source</th>
                                    <th class="col-1 p-1 text-center">2022 *</th>
                                    <th class="col-1 p-1 text-center">2023</th>
                                    <th class="col-1 p-1 text-center">2024</th>
                                    <th class="col-1 p-1 text-center">2025</th>
                                    <th class="col-1 p-1 text-center">2026 &amp; Beyond</th>
                                    <th class="col-1 p-1 text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($project->fs_investments as $key => $fs)
                                <tr class="border-bottom">
                                    <th class="p-1 text-left">
                                        <input type="hidden" name="fs_investments[{{ $key }}][ref_funding_source_id]"
                                               value="{{ old('fs_investments.{$fs->id}.ref_funding_source_id', $fs->ref_funding_source_id ?? 0) }}">
                                        {{ $fs->funding_source->name }}
                                    </th>
                                    <td class="p-1">
                                        <input type="text"
                                               class="fs_investments fs_investments_2022 fs_investments_{{$key}} money form-control text-right width-full"
                                               name="fs_investments[{{$key}}][y2022]"
                                               value="{{ old("fs_investments.{$fs->id}.y2022", $fs->y2022 ?? 0) }}">
                                    </td>
                                    <td class="p-1"><input type="text"
                                               class="fs_investments fs_investments_2023 fs_investments_{{$key}} money form-control text-right width-full"
                                               name="fs_investments[{{$key}}][y2023]"
                                               value="{{ old("fs_investments.{$fs->id}.y2023", $fs->y2023 ?? 0) }}">
                                    </td>
                                    <td class="p-1"><input type="text"
                                               class="fs_investments fs_investments_2024 fs_investments_{{$key}} money form-control text-right width-full"
                                               name="fs_investments[{{$key}}][y2024]"
                                               value="{{ old("fs_investments.{$fs->id}.y2024", $fs->y2024 ?? 0) }}">
                                    </td>
                                    <td class="p-1"><input type="text"
                                               class="fs_investments fs_investments_2025 fs_investments_{{$key}} money form-control text-right width-full"
                                               name="fs_investments[{{$key}}][y2025]"
                                               value="{{ old("fs_investments.{$fs->id}.y2025", $fs->y2025 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text"
                                               class="fs_investments fs_investments_2026 fs_investments_{{$key}} money form-control text-right width-full"
                                               name="fs_investments[{{$key}}][y2026]"
                                               value="{{ old("fs_investments.{$fs->id}.y2026", $fs->y2026 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="form-control text-right  width-full"
                                               id="fs_investments_{{$key}}_total" disabled>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="border-bottom">
                                <th class="p-1">Total</th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="fs_investments_2022_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="fs_investments_2023_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="fs_investments_2024_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                            id="fs_investments_2025_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="fs_investments_2026_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control text-right width-full" id="fs_investments_total"
                                           readonly>
                                </th>
                            </tr>
                            </tfoot>
                        </table>

                        <p class="note">* Based on NEP</p>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="">Investment Requirements by Region (in absolute PhP)</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table">
                            <thead>
                            <tr class="border-top border-bottom">
                                <th class="col-1 p-1">Region</th>
                                <th class="col-1 p-1 text-center">2022 *</th>
                                <th class="col-1 p-1 text-center">2023</th>
                                <th class="col-1 p-1 text-center">2024</th>
                                <th class="col-1 p-1 text-center">2025</th>
                                <th class="col-1 p-1 text-center">2026 &amp; Beyond</th>
                                <th class="col-1 p-1 text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($project->region_investments->sortby('region.order') as $key => $fs)
                                <tr class="border-bottom">
                                    <th class="p-1 text-left">
                                        <input type="hidden" name="region_investments[{{ $key }}][ref_region_id]"
                                               value="{{ old("fs_investments.{$key}.ref_region_id", $fs->ref_region_id ?? 0) }}">
                                        {{ $fs->region->label }}
                                    </th>
                                    <td class="p-1">
                                        <input type="text"
                                               class="region_investments region_investments_2022 region_investments_{{$key}} money form-control text-right width-full"
                                               name="region_investments[{{$key}}][y2022]"
                                               value="{{ old("region_investments.{$key}.y2022", $fs->y2022 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text"
                                               class="region_investments region_investments_2023 region_investments_{{$key}} money form-control text-right width-full"
                                               name="region_investments[{{$key}}][y2023]"
                                               value="{{ old("region_investments.{$key}.y2023", $fs->y2023 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text"
                                               class="region_investments region_investments_2024 region_investments_{{$key}} money form-control text-right width-full"
                                               name="region_investments[{{$key}}][y2024]"
                                               value="{{ old("region_investments.{$key}.y2024", $fs->y2024 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text"
                                               class="region_investments region_investments_2025 region_investments_{{$key}} money form-control text-right width-full"
                                               name="region_investments[{{$key}}][y2025]"
                                               value="{{ old("region_investments.{$key}.y2025", $fs->y2025 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text"
                                               class="region_investments region_investments_2026 region_investments_{{$key}} money form-control text-right width-full"
                                               name="region_investments[{{$key}}][y2026]"
                                               value="{{ old("region_investments.{$key}.y2026", $fs->y2026 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="form-control text-right  width-full"
                                               id="region_investments_{{$key}}_total" disabled>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="border-bottom">
                                <th class="p-1">Total</th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="region_investments_2022_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="region_investments_2023_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="region_investments_2024_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="region_investments_2025_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control money text-right width-full"
                                           id="region_investments_2026_total" readonly>
                                </th>
                                <th class="p-1">
                                    <input type="text" class="form-control text-right width-full" id="region_investments_total"
                                           readonly>
                                </th>
                            </tr>
                            </tfoot>
                        </table>

                        <p class="note">* Based on NEP</p>
                    </dd>
                </dl>

                <x-subhead subhead="Financial Accomplishments" id="financial-accomplishments"></x-subhead>

                <dl class="form-group @error('pap_code') errored @enderror">
                    <dt>
                        <label for="">PAP Code</label>
                    </dt>
                    <dd>
                        <input type="text" name="pap_code" class="form-control" id="pap_code" aria-describedby="pap-code-validation" value="{{ old('pap_code', $project->pap_code) }}">
                        <x-error-message name="pap_code" id="pap-code-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('ref_tier_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_tier_id" class="required">Category </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select :options="$tiers" name="ref_tier_id" selected="{{ old('ref_tier_id', $project->ref_tier_id) }}" aria-describedby="ref_tier_id-validation"></x-select>
                        <x-error-message name="ref_tier_id" id="ref_tier_id-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('uacs_code') errored @enderror">
                    <dt>
                        <label for="">UACS Code</label>
                    </dt>
                    <dd>
                        <input type="text" name="uacs_code" class="form-control" id="uacs_code" aria-describedby="uacs-code-validation" value="{{ old('uacs_code', $project->uacs_code) }}">
                        <x-error-message name="uacs_code" id="uacs-code-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="">Financial Accomplishments</label>
                    </dt>
                    <dd class="form-group-body">
                        <table class="col-12 d-table">
                            <thead>
                                <tr class="border-top border-bottom">
                                    <th class="col-3 p-1">Year </th>
                                    <th class="col-3 p-1">Amount included in the NEP</th>
                                    <th class="col-3 p-1">Amount Allocated in the Budget/GAA</th>
                                    <th class="col-3 p-1">Actual Amount Disbursed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom">
                                    <th class="p-1 text-center">2017</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                           name="nep[y2017]"
                                           value="{{ old("nep.y2017", $project->nep->y2017 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                           name="allocation[y2017]"
                                           value="{{ old("allocation.y2017", $project->allocation->y2017 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2017]"
                                               value="{{ old("disbursement.y2017", $project->disbursement->y2017 ?? 0) }}">
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="text-center">2018</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                               name="nep[y2018]"
                                               value="{{ old("nep.y2018", $project->nep->y2018 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                               name="allocation[y2018]"
                                               value="{{ old("allocation.y2018", $project->allocation->y2018 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2018]"
                                               value="{{ old("disbursement.y2018", $project->disbursement->y2018 ?? 0) }}">
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="text-center">2019</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                               name="nep[y2019]"
                                               value="{{ old("nep.y2017", $project->nep->y2019 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                               name="allocation[y2019]"
                                               value="{{ old("allocation.y2019", $project->allocation->y2019 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2019]"
                                               value="{{ old("disbursement.y2019", $project->disbursement->y2019 ?? 0) }}">
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="p-1 text-center">2020</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                               name="nep[y2020]"
                                               value="{{ old("nep.y2020", $project->nep->y2020 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                               name="allocation[y2020]"
                                               value="{{ old("allocation.y2020", $project->allocation->y2020 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2020]"
                                               value="{{ old("disbursement.y2020", $project->disbursement->y2020 ?? 0) }}">
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="p-1 text-center">2021</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                               name="nep[y2021]"
                                               value="{{ old("nep.y2021", $project->nep->y2021 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                               name="allocation[y2021]"
                                               value="{{ old("allocation.y2021", $project->allocation->y2021 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2021]"
                                               value="{{ old("disbursement.y2021", $project->disbursement->y2021 ?? 0) }}">
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="p-1 text-center">2022</th>
                                    <td class="p-1">
                                        <input type="text" class="nep money form-control text-right width-full"
                                               name="nep[y2022]"
                                               value="{{ old("nep.y2022", $project->nep->y2022 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="allocation money form-control text-right width-full"
                                               name="allocation[y2022]"
                                               value="{{ old("allocation.y2022", $project->allocation->y2022 ?? 0) }}">
                                    </td>
                                    <td class="p-1">
                                        <input type="text" class="disbursement money form-control text-right width-full"
                                               name="disbursement[y2022]"
                                               value="{{ old("disbursement.y2022", $project->disbursement->y2022 ?? 0) }}">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="border-bottom">
                                    <th class="p-1">Total</th>
                                    <th class="p-1">
                                        <input type="text" class="money form-control text-right width-full"
                                           id="nep_total" readonly>
                                    </th>
                                    <th class="p-1">
                                        <input type="text" class="money form-control text-right width-full"
                                           id="allocation_total" readonly>
                                    </th>
                                    <th class="p-1">
                                        <input type="text" class="money form-control text-right width-full"
                                           id="disbursement_total" readonly>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </dd>
                </dl>
            </div>

            <div class="Box-footer">
                <button class="btn btn-primary">Save</button>
                <a href="{{ route('projects.index') }}" class="btn">Back to List</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <script>
        function formatToMoney(value) {
            // console.log('formatToMoney initial value: ', value)
            if (parseFloat(value) === 0) return 0
            return value
                .toString()
                .replace(/\.00$/,'')
                .replace(/^0+/,'')
                .replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ',')
        }

        $('input.money').keyup(function (evt) {
            if (event.which >= 37 && event.which <= 40) return

            $(this).val(function (index, value) {
                if (parseInt(value) === 0) return 0
                return formatToMoney(value)
            })
        })

        const listenersForSum = [
            'feasibility_study',
            'right_of_way',
            'resettlement_action_plan',
            'nep',
            'fs',
            'allocation',
            'disbursement',
            'fs_investments',
            'region_investments',
            'fs_infrastructures',
            'region_infrastructures',
            'fs_investments_0',
            'fs_investments_1',
            'fs_investments_2',
            'fs_investments_3',
            'fs_investments_4',
            'fs_investments_5',
            'fs_investments_6',
            'fs_investments_7',
            'fs_investments_8',
            'fs_investments_9',
            'fs_infrastructures_0',
            'fs_infrastructures_1',
            'fs_infrastructures_2',
            'fs_infrastructures_3',
            'fs_infrastructures_4',
            'fs_infrastructures_5',
            'fs_infrastructures_6',
            'fs_infrastructures_7',
            'fs_infrastructures_8',
            'fs_infrastructures_9',
            'fs_investments_2022',
            'fs_investments_2023',
            'fs_investments_2024',
            'fs_investments_2025',
            'fs_investments_2026',
            'fs_infrastructures_2022',
            'fs_infrastructures_2023',
            'fs_infrastructures_2024',
            'fs_infrastructures_2025',
            'fs_infrastructures_2026',
            'region_investments_2022',
            'region_investments_2023',
            'region_investments_2024',
            'region_investments_2025',
            'region_investments_2026',
            'region_investments_0',
            'region_investments_1',
            'region_investments_2',
            'region_investments_3',
            'region_investments_4',
            'region_investments_5',
            'region_investments_7',
            'region_investments_8',
            'region_investments_9',
            'region_investments_10',
            'region_investments_11',
            'region_investments_12',
            'region_investments_13',
            'region_investments_14',
            'region_investments_15',
            'region_investments_16',
            'region_investments_17',
            'region_infrastructures_0',
            'region_infrastructures_1',
            'region_infrastructures_2',
            'region_infrastructures_3',
            'region_infrastructures_4',
            'region_infrastructures_5',
            'region_infrastructures_7',
            'region_infrastructures_8',
            'region_infrastructures_9',
            'region_infrastructures_10',
            'region_infrastructures_11',
            'region_infrastructures_12',
            'region_infrastructures_13',
            'region_infrastructures_14',
            'region_infrastructures_15',
            'region_infrastructures_16',
            'region_infrastructures_17',
            'region_infrastructures_2022',
            'region_infrastructures_2023',
            'region_infrastructures_2024',
            'region_infrastructures_2025',
            'region_infrastructures_2026',
        ];

        const regions = @json($regions->pluck('id')->toArray()).map(region => ('region_investments_' + region))

        listenersForSum.push(...regions)

        // console.log(listenersForSum)

        const $doc = $(document)

        function calculateSum(items) {
            // console.log('calculating sum of ', items)
            // initialize sum variable
            let sum = 0
            // iterate over items
            $('.' + items).each(function() {
                // format the value first
                let $this = $(this)
                let val = parseFloat($this.val() ? $this.val().replace(/,/g, '') : 0)
                sum += val
            })

            $('#' + items + '_total').val(formatToMoney(sum))
        }

        $doc.ready(function () {
            // initializeSelect2()

            $('.money').each(function() {
                $(this).val(formatToMoney($(this).val()))
            })

            listenersForSum.forEach(listener => {
                // console.log('calculating for ', listener)
                calculateSum(listener)
            })
        })

        listenersForSum.forEach(listener => {
            $('.' + listener).on('keyup blur', function() {
                calculateSum(listener)
            })
        })
    </script>
@endpush
