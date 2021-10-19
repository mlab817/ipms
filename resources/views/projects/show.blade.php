@extends('layouts.app')

@section('page-header')
    <x-page-header>
        <h1 class=" d-flex flex-wrap flex-items-center wb-break-word f3 text-normal">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo color-icon-secondary mr-2">
                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
            </svg>

            <span class="author flex-self-stretch" itemprop="author">
                    <a class="url fn" rel="author" href="{{ route('users.show', $project->creator) }}">
                        {{ $project->creator->username }}
                    </a>
                </span>

            <span class="mx-1 flex-self-stretch color-text-secondary">/</span>

            <strong itemprop="name" class="mr-2 flex-self-stretch">
                <a href="#">
                    {{ $project->title }}
                </a>
            </strong>

            <span></span>

            <span class="Label Label--secondary v-align-middle mr-1">{{ $project->pap_type->name }}</span>
        </h1>
    </x-page-header>
@endsection

@section('content')
    <div x-data="{ tab: 'profile' }">
        <div class="tabnav">
            <nav class="tabnav-tabs" aria-label="Foo bar">
                <a class="tabnav-tab" @click="tab = 'profile'" :aria-current="tab === 'profile' ? 'page' : null" style="cursor:pointer;">Profile</a>
                <a class="tabnav-tab" @click="tab = 'history'" :aria-current="tab === 'history' ? 'page' : null" style="cursor:pointer;">History</a>
            </nav>
        </div>

        <div x-show="tab === 'profile'">
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
                        <details class="details-reset details-overlay details-overlay-dark mr-1">
                            <summary class="btn tooltipped tooltipped-nw" aria-label="Endorse this PAP" aria-haspopup="dialog">
                                <svg class="octicon octicon-plane" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.592 2.712L2.38 7.25h4.87a.75.75 0 110 1.5H2.38l-.788 4.538L13.929 8 1.592 2.712zM.989 8L.064 2.68a1.341 1.341 0 011.85-1.462l13.402 5.744a1.13 1.13 0 010 2.076L1.913 14.782a1.341 1.341 0 01-1.85-1.463L.99 8z"></path></svg>
                                Endorse
                            </summary>
                            <details-dialog class="Box--overlay d-flex flex-column anim-fade-in fast">
                                <form action="{{ route('projects.submit', $project) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="Box">
                                        <div class="Box-header">
                                            <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                                <!-- <%= octicon "x" %> -->
                                                <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                                            </button>
                                            <h2 class="Box-title">Submit PAP</h2>
                                        </div>
                                        <div class="flash flash-warn flash-full m-0">
                                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-alert">
                                                <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                            </svg>
                                            <strong class="overflow-hidden">Unexpected bad things will happen if you don’t read this!</strong>
                                        </div>
                                        <div class="Box-body">
                                            <div class="d-flex flex-nowrap">
                                                <div>
                                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-checklist">
                                                        <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                                    </svg>
                                                </div>
                                                <div class="pl-3 flex-1">
                                                    <p class="overflow-hidden mb-1">Before you submit, please consider:</p>
                                                    <ul class="ml-3">
                                                        <li>
                                                            <strong>Endorsed:</strong> The PAP will be endorsed for validation of the IPD.
                                                            Once endorsed, you will <strong>No</strong> longer be able to edit the PAP.
                                                            Only IPD can restore the PAP to DRAFT provided the PAP has not been validated.
                                                        </li>
                                                        <li>
                                                            <strong>Dropped:</strong> The PAP will be dropped from the PIP/TRIP, i.e. it will no longer
                                                            be considered for inclusion to the PIP/TRIP. The PAP will still remain in the
                                                            list of PAPs. If you wish to permanently delete the PAP, use the Delete function.
                                                            The IPD will also validate dropped PAPs and similar to endorsement, you will have
                                                            to request IPD to restore the PAP.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <select name="ref_submission_status_id" id="ref_submission_status_id" class="mt-3 form-select input-block">
                                                @foreach($submission_statuses as $option)
                                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="Box-footer">
                                            <button type="button" class="btn btn-primary btn-block" data-close-dialog>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </details-dialog>
                        </details>

                        <a class="btn btn-primary tooltipped tooltipped-nw mr-1" href="{{ route('projects.edit', $project) }}" aria-label="Edit this PAP" data-hotkey="e" data-disable-with="">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-pencil">
                                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                            </svg>
                            Edit
                        </a>

                        <form class="inline-form" action="{{ route('projects.destroy', $project) }}" accept-charset="UTF-8" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure you want to delete this PAP?')" class="btn btn-danger tooltipped tooltipped-nw" type="submit" aria-label="Delete this PAP" data-disable-with="">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-trash">
                                    <path fill-rule="evenodd" d="M6.5 1.75a.25.25 0 01.25-.25h2.5a.25.25 0 01.25.25V3h-3V1.75zm4.5 0V3h2.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H5V1.75C5 .784 5.784 0 6.75 0h2.5C10.216 0 11 .784 11 1.75zM4.496 6.675a.75.75 0 10-1.492.15l.66 6.6A1.75 1.75 0 005.405 15h5.19c.9 0 1.652-.681 1.741-1.576l.66-6.6a.75.75 0 00-1.492-.149l-.66 6.6a.25.25 0 01-.249.225h-5.19a.25.25 0 01-.249-.225l-.66-6.6z"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="Box-body">

                    <div class="flash my-0 flash-success">
                        <p>PIPOL Code: {{ $project->code }}</p>
                    </div>

                    <x-subhead subhead="General Information" id="general-information"></x-subhead>

                    <dl>
                        <dt><label>Title</label></dt>
                        <dd>{{ $project->title }}</dd>
                    </dl>

                    <dl>
                        <dt><label>Type</label></dt>
                        <dd>{{ $project->pap_type->name }}</dd>
                    </dl>

                    <dl>
                        <dt><label>Is this a regular program?</label></dt>
                        <dd>{{ $project->regular_program ? 'Yes' : 'No' }}</dd>
                    </dl>

                    <dl>
                        <dt><label>Basis for Implementation</label></dt>
                        <dd>
                            <ul class="pl-4">
                            @forelse($project->bases as $basis)
                                <li>{{ $basis->name }}</li>
                                @empty
                                <li>None selected.</li>
                            @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Description</label></dt>
                        <dd>{!! $project->description->description !!}</dd>
                    </dl>

                    <dl>
                        <dt><label>Total Project Cost</label></dt>
                        <dd>PhP {{ number_format($project->total_project_cost, 2) }}</dd>
                    </dl>

                    <x-subhead subhead="Implementing Agencies" id="implementing-agencies">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Office</label></dt>
                        <dd>{{ $project->office->name }}</dd>
                    </dl>

                    <dl>
                        <dt><label>Implementing Agencies</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->operating_units as $ou)
                                    <li>{{ $ou->name }}</li>
                                    @empty
                                    <li>None selected.</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <x-subhead subhead="Spatial Coverage" id="spatial-coverage">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Spatial Coverage</label></dt>
                        <dd>
                            {{ $project->spatial_coverage->name }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Regions</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->regions as $region)
                                    <li>{{ $region->name }}</li>
                                @empty
                                    <li>None selected.</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <x-subhead subhead="Approval Status" id="approval-status"></x-subhead>

                    <dl>
                        <dt><label>Is the Project ICC-able?</label></dt>
                        <dd>
                            {{ $project->iccable ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Level of Approval (For ICCable only)</label></dt>
                        <dd>
                            {{ $project->approval_level->name }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Date of Submission/Approval</label></dt>
                        <dd>
                            {{ $project->approval_level_date ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Project for Inclusion in Which Programming Document" id="programming-document">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Public Investment Program (PIP)</label></dt>
                        <dd>
                            {{ $project->pip ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Typology</label></dt>
                        <dd>
                            {{ $project->pip_typology->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Core Investment Program/Projects (CIP)</label></dt>
                        <dd>
                            {{ $project->cip ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Type of CIP</label></dt>
                        <dd>
                            {{ $project->cip_type->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Three-Year Rolling Infrastructure Program (TRIP)</label></dt>
                        <dd>
                            {{ $project->trip ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Is it a Research and Development Program/Project?</label></dt>
                        <dd>
                            {{ $project->research ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Is it an Infrastructure Flagship Project(IFP)?</label></dt>
                        <dd>
                            {{ $project->ifp ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Is it an ICT program/project?</label></dt>
                        <dd>
                            {{ $project->ict ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Is it responsive to COVID-19/New Normal Intervention?</label></dt>
                        <dd>
                            {{ $project->covid ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Included in the following COVID documents/plans: </label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse ($project->covid_interventions as $intervention)
                                    <li>{{ $intervention->name }}</li>
                                @empty
                                    <li>None selected.</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Regional Development Investment Program</label></dt>
                        <dd>
                            {{ $project->rdip ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Is RDC endorsement required?</label></dt>
                        <dd>
                            {{ $project->rdc_endorsement_required ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Has the project been endorsed?</label></dt>
                        <dd>
                            {{ $project->rdc_endorsed ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>RDC Endorsement Date</label></dt>
                        <dd>
                            {{ $project->rdc_endorsed_date ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Physical and Financial Status" id="physical-and-financial-status">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Status of Implementation Readiness</label></dt>
                        <dd>
                            {{ $project->project_status->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Updates</label></dt>
                        <dd>
                            {{ $project->project_update->updates ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>As of</label></dt>
                        <dd>
                            {{ $project->project_update->updates_date ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Will this require resubmission to the ICC?</label></dt>
                        <dd>
                            {{ $project->icc_resubmission ? 'Yes': 'No' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Implementation Period" id="implementation-period">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Start of Implementation</label></dt>
                        <dd>
                            {{ $project->target_start_year }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Year of Project Completion</label></dt>
                        <dd>
                            {{ $project->target_end_year }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Philippine Development Plan" id="pdp">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Main philippine
                                Development Chapter</label></dt>
                        <dd>
                            {{ $project->pdp_chapter->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Other PDP
                                Chapters</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->pdp_chapters as $chapter)
                                    <li>{{ $chapter->name }}</li>
                                @empty
                                    <li>None selected</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <x-subhead subhead="Philippine Development Results Matrices (PDP-RM) Indicators" id="pdp-rm-indicators">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Philippine Development Results Matrices (PDP-RM) Indicators</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->pdp_indicators as $indicator)
                                    <li>{{ $indicator->name }}</li>
                                @empty
                                    <li>None selected</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Expected Outputs</label></dt>
                        <dd>{{ strip_tags($project->expected_output->expected_outputs) }}</dd>
                    </dl>

                    <x-subhead subhead="Sustainable Development Goals" id="sdgs">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Sustainable Development Goals</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->sdgs as $sdg)
                                    <li>{{ $sdg->name }} <br/> <span class="text-muted">{{ $sdg->description }}</span></li>
                                @empty
                                    <li>None selected</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <x-subhead subhead="Ten Point Agenda" id="ten-point-agenda">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Ten Point Agenda</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->ten_point_agendas as $tpa)
                                    <li>{{ $tpa->name }} <br/><span class="text-muted"> {{ $tpa->description }}</span></li>
                                @empty
                                    <li>None selected</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <x-subhead subhead="Project Preparation Details" id="project-preparation-details">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Project Preparation Document</label></dt>
                        <dd>
                            {{ $project->preparation_document->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Does the project require feasibility study?</label></dt>
                        <dd>
                            {{ $project->has_fs ? 'Yes' : 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Status of Feasibility Study (Only if FS is required)</label></dt>
                        <dd>
                            {{ $project->feasibility_study->fs_status->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Does the conduct of feasibility study need assistance?</label></dt>
                        <dd>
                            {{ $project->feasibility_study->needs_assistance ? 'Yes': 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Schedule of Feasibility Study Cost (in absolute PhP)</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="p-2 text-right">2017</th>
                                    <th class="p-2 text-right">2018</th>
                                    <th class="p-2 text-right">2019</th>
                                    <th class="p-2 text-right">2020</th>
                                    <th class="p-2 text-right">2021</th>
                                    <th class="p-2 text-right">2022</th>
                                    <th class="p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2017 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2018 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2019 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2020 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2021 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->y2022 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->feasibility_study->total ?? 0 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Expected/Target Date of Completion of FS</label></dt>
                        <dd>
                            {{ $project->feasibility_study->completion_date ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Pre-construction Costs" id="preconstruction-costs">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <!-- TODO: Row and Resettlement -->
                    <dl>
                        <dt><label>With ROWA Component?</label></dt>
                        <dd>
                            {{ $project->has_row ? 'Yes': 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Schedule of ROWA Cost (in absolute PhP)</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="p-2 text-right">2017</th>
                                    <th class="p-2 text-right">2018</th>
                                    <th class="p-2 text-right">2019</th>
                                    <th class="p-2 text-right">2020</th>
                                    <th class="p-2 text-right">2021</th>
                                    <th class="p-2 text-right">2022</th>
                                    <th class="p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2017 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2018 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2019 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2020 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2021 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->y2022 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->right_of_way->total ?? 0 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Affected Households</label></dt>
                        <dd>
                            {{ $project->right_of_way->affected_households ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>With Resettlement  Component?</label></dt>
                        <dd>
                            {{ $project->has_rap ? 'Yes': 'No' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Schedule of Resettlement Cost (in absolute PhP)</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="p-2 text-right">2017</th>
                                    <th class="p-2 text-right">2018</th>
                                    <th class="p-2 text-right">2019</th>
                                    <th class="p-2 text-right">2020</th>
                                    <th class="p-2 text-right">2021</th>
                                    <th class="p-2 text-right">2022</th>
                                    <th class="p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2017 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2018 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2019 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2020 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2021 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->y2022 ?? 0 }}</td>
                                    <td class="p-2 text-right">{{ $project->resettlement_action_plan->total ?? 0 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Affected Households</label></dt>
                        <dd>
                            {{ $project->resettlement_action_plan->affected_households ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>With ROWA and Resettlement Action Plan?</label></dt>
                        <dd>
                            {{ $project->has_row_rap ? 'Yes': 'No' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Employment Generation" id="employment-generation">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>No. of persons to be employed after completion of the project</label></dt>
                        <dd>
                            {{ $project->employment_generated ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Funding Source and Mode of Implementation" id="funding-source">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Main Funding Source</label></dt>
                        <dd>
                            {{ $project->funding_source->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Funding Institution</label></dt>
                        <dd>
                            {{ $project->funding_institution->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Mode of Implementation</label></dt>
                        <dd>
                            {{ $project->implementation_mode->name ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Project Costs" id="project-costs">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Total Investment Required by Funding Source</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="col-1 p-2">Funding Source</th>
                                    <th class="col-1 p-2 text-right">2022 &amp; Prior</th>
                                    <th class="col-1 p-2 text-right">2023</th>
                                    <th class="col-1 p-2 text-right">2024</th>
                                    <th class="col-1 p-2 text-right">2025</th>
                                    <th class="col-1 p-2 text-right">2026 &amp; Prior</th>
                                    <th class="col-1 p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->fs_investments as $fs_investment)
                                    <tr class="border-bottom">
                                        <td class="p-2">{{ $fs_investment->funding_source->name ?? '_' }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2022 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2023 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2024 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2025 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2026 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($fs_investment->y2022 + $fs_investment->y2023 + $fs_investment->y2024 + $fs_investment->y2025 + $fs_investment->y2026, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <th class="p-2 text-left">Total</th>
                                <th class="p-2 text-right">{{ number_format($project->fs_investments->sum('y2022'), 2) }}</th>
                                <th class="p-2 text-right">{{ number_format($project->fs_investments->sum('y2023'), 2) }}</th>
                                <th class="p-2 text-right">{{ number_format($project->fs_investments->sum('y2024'), 2) }}</th>
                                <th class="p-2 text-right">{{ number_format($project->fs_investments->sum('y2025'), 2) }}</th>
                                <th class="p-2 text-right">{{ number_format($project->fs_investments->sum('y2026'), 2) }}</th>
                                <th class="p-2 text-right">
                                    {{ number_format($project->fs_investments->sum('y2022')
                                        + $project->fs_investments->sum('y2023')
                                        + $project->fs_investments->sum('y2024')
                                        + $project->fs_investments->sum('y2025')
                                        + $project->fs_investments->sum('y2026'), 2) }}
                                </th>
                                </tfoot>
                            </table>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Total Investment Required by Region</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="col p-2">Region</th>
                                    <th class="col p-2 text-right">2022 &amp; Prior</th>
                                    <th class="col p-2 text-right">2023</th>
                                    <th class="col p-2 text-right">2024</th>
                                    <th class="col p-2 text-right">2025</th>
                                    <th class="col p-2 text-right">2026 &amp; Prior</th>
                                    <th class="col p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project->region_investments->sortBy('region.order') as $region_investment)
                                    <tr class="border-bottom">
                                        <td class="p-2">{{ $region_investment->region->name ?? '_' }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2022 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2023 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2024 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2025 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2026 ?? 0.00, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($region_investment->y2022 + $region_investment->y2023 + $region_investment->y2024 + $region_investment->y2025 + $region_investment->y2026, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="p-2 text-left">Total</th>
                                    <th class="p-2 text-right">{{ number_format($project->region_investments->sum('y2022'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->region_investments->sum('y2023'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->region_investments->sum('y2024'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->region_investments->sum('y2025'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->region_investments->sum('y2026'), 2) }}</th>
                                    <th class="p-2 text-right">
                                        {{ number_format($project->region_investments->sum('y2022')
                                            + $project->region_investments->sum('y2023')
                                            + $project->region_investments->sum('y2024')
                                            + $project->region_investments->sum('y2025')
                                            + $project->region_investments->sum('y2026'), 2) }}
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </dd>
                    </dl>

                    <x-subhead subhead="Financial Accomplishments" id="financial-accomplishments">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>PAP Code</label></dt>
                        <dd>
                            {{ $project->pap_code ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Categorization</label></dt>
                        <dd>
                            {{ $project->tier->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>UACS Code</label></dt>
                        <dd>
                            {{ $project->uacs_code ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Financial Status</label></dt>
                        <dd>
                            <table class="col-12 d-table border">
                                <thead>
                                <tr class="border-bottom">
                                    <th class="col-3 p-2 text-center">Year</th>
                                    <th class="col-3 p-2 text-right">Amount included in the NEP</th>
                                    <th class="col-3 p-2 text-right">Amount Allocated in the Budget/GAA</th>
                                    <th class="col-3 p-2 text-right">Actual Amount Disbursed</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2017</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2017 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2017 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2017 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2018</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2018 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2018 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2018 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2019</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2019 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2019 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2019 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2020</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2020 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2020 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2020 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2021</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2021 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2021 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2021 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">2022</th>
                                        <td class="p-2 text-right">{{ number_format($project->nep->y2022 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->allocation->y2022 ?? 0, 2) }}</td>
                                        <td class="p-2 text-right">{{ number_format($project->disbursement->y2022 ?? 0, 2) }}</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2 text-center">Total</th>
                                        <th class="p-2 text-right">
                                            {{
                                                number_format(($project->nep->y2016 ?? 0)
                                                    + ($project->nep->y2017 ?? 0)
                                                    + ($project->nep->y2018 ?? 0)
                                                    + ($project->nep->y2019 ?? 0)
                                                    + ($project->nep->y2020 ?? 0)
                                                    + ($project->nep->y2021 ?? 0)
                                                    + ($project->nep->y2022 ?? 0)
                                                    + ($project->nep->y2023 ?? 0), 2)
                                            }}
                                        </th>
                                        <th class="p-2 text-right">
                                            {{
                                                number_format(($project->allocation->y2016 ?? 0)
                                                    + ($project->allocation->y2017 ?? 0)
                                                    + ($project->allocation->y2018 ?? 0)
                                                    + ($project->allocation->y2019 ?? 0)
                                                    + ($project->allocation->y2020 ?? 0)
                                                    + ($project->allocation->y2021 ?? 0)
                                                    + ($project->allocation->y2022 ?? 0)
                                                    + ($project->allocation->y2023 ?? 0), 2)
                                            }}
                                        </th>
                                        <th class="p-2 text-right">
                                            {{
                                                number_format(($project->disbursement->y2016 ?? 0)
                                                    + ($project->disbursement->y2017 ?? 0)
                                                    + ($project->disbursement->y2018 ?? 0)
                                                    + ($project->disbursement->y2019 ?? 0)
                                                    + ($project->disbursement->y2020 ?? 0)
                                                    + ($project->disbursement->y2021 ?? 0)
                                                    + ($project->disbursement->y2022 ?? 0)
                                                    + ($project->disbursement->y2023 ?? 0), 2)
                                            }}
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </dd>
                    </dl>

                </div>
            </div>

            @if($project->trip)
                <div class="Box my-5" id="trip-information">
                    <div class="Box-header">
                        <h1 class="Box-title">TRIP Information</h1>
                    </div>

                    <div class="Box-body">
                        <x-subhead subhead="Total Infrastructure Cost by Funding Source">
                            <x-back-to-top></x-back-to-top>
                        </x-subhead>

                        <dl>
                            <dt><label>Infrastructure Sector</label></dt>
                            <dd>
                                <ul class="pl-4">
                                @forelse($project->infrastructure_sectors as $sector)
                                    <li>{{ $sector->name }}</li>
                                    @empty
                                    <li>None selected.</li>
                                @endforelse
                                </ul>
                            </dd>
                        </dl>

                        <dl>
                            <dt><label>Status of Implementation Readiness</label></dt>
                            <dd>
                                <ul class="pl-4">
                                    @forelse($project->prerequisites as $prerequisite)
                                        <li>{{ $prerequisite->name }}</li>
                                    @empty
                                        <li>None selected.</li>
                                    @endforelse
                                </ul>
                            </dd>
                        </dl>

                        <dl>
                            <dt><label>Implementation Risks and Mitigation Strategies</label></dt>
                            <dd>
                                {{ $project->risk->risk }}
                            </dd>
                        </dl>



                        <dl>
                            <dt><label>Total Infrastructure Cost by Funding Source</label></dt>
                            <dd>
                                <table class="col-12 d-table border">
                                    <thead>
                                    <tr class="border-bottom">
                                        <th class="col-1 p-2">Funding Source</th>
                                        <th class="col-1 p-2 text-right">2022 &amp; Prior</th>
                                        <th class="col-1 p-2 text-right">2023</th>
                                        <th class="col-1 p-2 text-right">2024</th>
                                        <th class="col-1 p-2 text-right">2025</th>
                                        <th class="col-1 p-2 text-right">2026 &amp; Prior</th>
                                        <th class="col-1 p-2 text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->fs_infrastructures as $fs_infrastructure)
                                        <tr class="border-bottom">
                                            <td class="p-2">{{ $fs_infrastructure->funding_source->name ?? '_' }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2022 ?? 0.00, 2) }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2023 ?? 0.00, 2) }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2024 ?? 0.00, 2) }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2025 ?? 0.00, 2) }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2026 ?? 0.00, 2) }}</td>
                                            <td class="p-2 text-right">{{ number_format($fs_infrastructure->y2022 + $fs_infrastructure->y2023 + $fs_infrastructure->y2024 + $fs_infrastructure->y2025 + $fs_infrastructure->y2026, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th class="p-2 text-left">Total</th>
                                    <th class="p-2 text-right">{{ number_format($project->fs_infrastructures->sum('y2022'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->fs_infrastructures->sum('y2023'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->fs_infrastructures->sum('y2024'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->fs_infrastructures->sum('y2025'), 2) }}</th>
                                    <th class="p-2 text-right">{{ number_format($project->fs_infrastructures->sum('y2026'), 2) }}</th>
                                    <th class="p-2 text-right">
                                        {{ number_format($project->fs_infrastructures->sum('y2022')
                                            + $project->fs_infrastructures->sum('y2023')
                                            + $project->fs_infrastructures->sum('y2024')
                                            + $project->fs_infrastructures->sum('y2025')
                                            + $project->fs_infrastructures->sum('y2026'), 2) }}
                                    </th>
                                    </tfoot>
                                </table>
                            </dd>
                        </dl>

                        <x-subhead subhead="Total Infrastructure Cost by Region">
                            <x-back-to-top></x-back-to-top>
                        </x-subhead>

                        <dl>
                            <dt><label>Total Infrastructure Cost by Region</label></dt>
                            <dd>
                                <table class="col-12 d-table border">
                                    <thead>
                                    <tr class="border-bottom">
                                        <th class="col p-2">Region</th>
                                        <th class="col p-2 text-right">2022 &amp; Prior</th>
                                        <th class="col p-2 text-right">2023</th>
                                        <th class="col p-2 text-right">2024</th>
                                        <th class="col p-2 text-right">2025</th>
                                        <th class="col p-2 text-right">2026 &amp; Prior</th>
                                        <th class="col p-2 text-right">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($project->region_infrastructures->sortBy('region.order') as $region_infrastructure)
                                        <tr class="border-bottom">
                                            <td class="p-2">{{ $region_infrastructure->region->name ?? '_' }}</td>
                                            <td class="p-2 text-right">{{ $region_infrastructure->y2022 ?? '0.00' }}</td>
                                            <td class="p-2 text-right">{{ $region_infrastructure->y2023 ?? '0.00' }}</td>
                                            <td class="p-2 text-right">{{ $region_infrastructure->y2024 ?? '0.00' }}</td>
                                            <td class="p-2 text-right">{{ $region_infrastructure->y2025 ?? '0.00' }}</td>
                                            <td class="p-2 text-right">{{ $region_infrastructure->y2026 ?? '0.00' }}</td>
                                            <td class="p-2 text-right">{{ number_format($region_infrastructure->y2022 + $region_infrastructure->y2023 + $region_infrastructure->y2024 + $region_infrastructure->y2025 + $region_infrastructure->y2026, 2) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th class="p-2 text-left">Total</th>
                                        <th class="p-2 text-right">{{ number_format($project->region_infrastructures->sum('y2022'), 2) }}</th>
                                        <th class="p-2 text-right">{{ number_format($project->region_infrastructures->sum('y2023'), 2) }}</th>
                                        <th class="p-2 text-right">{{ number_format($project->region_infrastructures->sum('y2024'), 2) }}</th>
                                        <th class="p-2 text-right">{{ number_format($project->region_infrastructures->sum('y2025'), 2) }}</th>
                                        <th class="p-2 text-right">{{ number_format($project->region_infrastructures->sum('y2026'), 2) }}</th>
                                        <th class="p-2 text-right">
                                            {{ number_format($project->region_infrastructures->sum('y2022')
                                                + $project->region_infrastructures->sum('y2023')
                                                + $project->region_infrastructures->sum('y2024')
                                                + $project->region_infrastructures->sum('y2025')
                                                + $project->region_infrastructures->sum('y2026'), 2) }}
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </dd>
                        </dl>
                    </div>
                </div>
            @endif
        </div>

        <div x-cloak x-show="tab === 'history'">
            <div class="Box">
                <div class="Box-header">
                    <h2 class="Box-title">History: {{ $project->title }}</h2>
                </div>
                <ul>
                    @foreach($project->audit_logs->sortByDesc('created_at') as $log)
                        <li class="Box-row">
                            {{ ucfirst($log->description) }} by {{ $log->user->full_name }} on {{ $log->created_at }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function backToTop() {
            // function to scroll back to top
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
@endpush