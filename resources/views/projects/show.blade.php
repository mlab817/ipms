@extends('layouts.app')

@section('content')
    <div x-model="{ tab: 'profile' }">
        <div class="tabnav">
            <nav class="tabnav-tabs" aria-label="Foo bar">
                <a class="tabnav-tab" @click="tab = 'profile'; $nextTick(() => console.log('profile'))" aria-current="page" style="cursor:pointer;">Profile</a>
                <a class="tabnav-tab" @click="tab = 'history'; $nextTick(() => console.log('history'))" style="cursor:pointer;">History</a>
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
                                <li><a class="dropdown-item" href="#url">Dropdown item</a></li>
                                <li><a class="dropdown-item" href="#url">Dropdown item</a></li>
                                <li><a class="dropdown-item" href="#url">Dropdown item</a></li>
                            </ul>
                        </details>

                        <h2 class="Box-title">
                            {{ $project->title }}
                        </h2>
                    </div>

                    <div class="d-flex py-1 py-md-0 flex-auto flex-order-1 flex-md-order-2 flex-sm-grow-0 flex-justify-between hide-sm hide-md">
                        <a class="btn-octicon tooltipped tooltipped-nw" href="{{ route('projects.edit', $project) }}" aria-label="Edit this PAP" data-hotkey="e" data-disable-with="">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-pencil">
                                <path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path>
                            </svg>
                        </a>
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
                <div class="Box-body">
                    <x-subhead subhead="General Information"></x-subhead>

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

                    <x-subhead subhead="Implementing Agencies">
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

                    <x-subhead subhead="Spatial Coverage">
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

                    <x-subhead subhead="Approval Status"></x-subhead>

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

                    <x-subhead subhead="Project for Inclusion in Which Programming Document">
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

                    <x-subhead subhead="Physical and Financial Status">
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

                    <x-subhead subhead="Implementation Period">
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

                    <x-subhead subhead="Philippine Development Plan">
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

                    <x-subhead subhead="Philippine Development Results Matrices (PDP-RM) Indicators">
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

                    <x-subhead subhead="Sustainable Development Goals">
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

                    <x-subhead subhead="Ten Point Agenda">
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

                    <x-subhead subhead="Project Preparation Details">
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

                    <x-subhead subhead="Pre-construction Costs">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <!-- TODO: Row and Resettlement -->

                    <x-subhead subhead="Employment Generation">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>No. of persons to be employed after completion of the project</label></dt>
                        <dd>
                            {{ $project->employment_generated ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Funding Source and Mode of Implementation">
                        <x-back-to-top></x-back-to-top>
                    </x-subhead>

                    <dl>
                        <dt><label>Main Funding Source</label></dt>
                        <dd>
                            {{ $project->funding_source->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Other Funding Sources</label></dt>
                        <dd>
                            <ul class="pl-4">
                                @forelse($project->funding_sources as $funding_source)
                                    <li>{{ $funding_source->name }}</span></li>
                                @empty
                                    <li>None selected</li>
                                @endforelse
                            </ul>
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Mode of Implementation</label></dt>
                        <dd>
                            {{ $project->implementation_mode->name ?? '_' }}
                        </dd>
                    </dl>

                    <dl>
                        <dt><label>Funding Institution</label></dt>
                        <dd>
                            {{ $project->funding_institution->name ?? '_' }}
                        </dd>
                    </dl>

                    <x-subhead subhead="Project Costs">
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

                    <x-subhead subhead="Financial Accomplishments">
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
                                    <th></th>
                                    <th class="col-1 p-2 text-right">2016 &amp; Prior</th>
                                    <th class="col-1 p-2 text-right">2017</th>
                                    <th class="col-1 p-2 text-right">2018</th>
                                    <th class="col-1 p-2 text-right">2019</th>
                                    <th class="col-1 p-2 text-right">2020</th>
                                    <th class="col-1 p-2 text-right">2021</th>
                                    <th class="col-1 p-2 text-right">2022</th>
                                    <th class="col-1 p-2 text-right">2023 &amp; Beyond</th>
                                    <th class="col-1 p-2 text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="border-bottom">
                                    <td class="p-2">National Expenditure Program (NEP)</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2016 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2017 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2018 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2019 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2020 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2021 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2022 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->nep->y2023 ?? 0, 2) }}</td>
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
                                </tr>
                                <tr class="border-bottom">
                                    <td class="p-2">General Appropriations Act (GAA)</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2016 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2017 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2018 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2019 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2020 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2021 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2022 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->allocation->y2023 ?? 0, 2) }}</td>
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
                                </tr>
                                <tr class="border-bottom">
                                    <td class="p-2">Actual Disbursement</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2016 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2017 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2018 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2019 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2020 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2021 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2022 ?? 0, 2) }}</td>
                                    <td class="p-2 text-right">{{ number_format($project->disbursement->y2023 ?? 0, 2) }}</td>
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

            @if($project->has_infra)
                <div class="Box my-5">
                    <div class="Box-header">
                        <h1 class="Box-title">TRIP Information</h1>
                    </div>

                    <div class="Box-body">
                        <x-subhead subhead="Total Infrastructure Cost by Funding Source">
                            <x-back-to-top></x-back-to-top>
                        </x-subhead>

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
                    <h2 class="Box-title">{{ $project->title }}</h2>
                </div>
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