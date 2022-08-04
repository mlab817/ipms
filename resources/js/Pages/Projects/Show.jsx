import React from 'react'
import Authenticated from "@/Layouts/Authenticated";
import {Box, Heading} from "@primer/react";

const ProjectsShow = ({ project }) => {
    return (
        <Authenticated>
            <Box>
                <Heading as="h2">{project.title}</Heading>
                <div className="float-right">
                    <details className="dropdown details-reset details-overlay">
                        <summary className="btn-octicon v-align-middle">
                            <svg className="octicon octicon-kebab-horizontal" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 16 16" width="16" height="16">
                                <path
                                    d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <ul className="dropdown-menu dropdown-menu-sw ">
                            <li>
                                <a className="dropdown-item" href={route('projects.edit', project)}>
                                    Edit
                                </a>
                            </li>
                        </ul>
                    </details>
                </div>
            </Box>


                                                    {/*{{$project->title}}*/}
                                                    {/*    </h3>*/}
                                                    {/*    </div>*/}

                                                    {/*    <div className="Box-body">*/}

                                                    {/*    <x-subhead subhead="General Information" id="general-information"></x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt>*/}
                                                    {/*    <label for="title">Title</label><x-copy for="title"></x-copy>*/}
                                                    {/*    </dt>*/}
                                                    {/*    <dd><span id="title">{{$project->title}}</span></dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Type</label></dt>*/}
                                                    {/*    <dd>{{$project->pap_type->name}}</dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is this a regular program?</label></dt>*/}
                                                    {/*    <dd>{{$project->regular_program ? 'Yes' : 'No'}}</dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Basis for Implementation</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->bases as $basis)*/}
                                                    {/*    <li>{{$basis->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt>*/}
                                                    {/*    <label>Description</label>*/}
                                                    {/*    <x-copy for="description"></x-copy>*/}
                                                    {/*    </dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <span id="description">*/}
                                                    {/*{!! $project->description->description !!}*/}
                                                    {/*    </span>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Total Project Cost (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>PhP {{number_format($project->total_project_cost, 2)}}</dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Implementing Agencies" id="implementing-agencies">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Office</label></dt>*/}
                                                    {/*    <dd>{{$project->office->name}}</dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Implementing Agencies</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->operating_units as $ou)*/}
                                                    {/*    <li>{{$ou->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Spatial Coverage" id="spatial-coverage">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Spatial Coverage</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->spatial_coverage->name}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Regions</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->regions->sortBy('region.order') as $region)*/}
                                                    {/*    <li>{{$region->label}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Approval Status" id="approval-status"></x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is the Project ICC-able?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->iccable ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Level of Approval (For ICCable only)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->approval_level->name}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Date of Submission/Approval</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->approval_level_date ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Project for Inclusion in Which Programming Document" id="programming-document">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Public Investment Program (PIP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->pip ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Typology</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->pip_typology->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Core Investment Program/Projects (CIP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->cip ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Type of CIP</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->cip_type->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Three-Year Rolling Infrastructure Program (TRIP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->trip ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is it a Research and Development Program/Project?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->research ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is it an Infrastructure Flagship Project(IFP)?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->ifp ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is it an ICT program/project?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->ict ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is it responsive to COVID-19/New Normal Intervention?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->covid ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Included in the following COVID documents/plans: </label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse ($project->covid_interventions as $intervention)*/}
                                                    {/*    <li>{{$intervention->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Regional Development Investment Program</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->rdip ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Is RDC endorsement required?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->rdc_endorsement_required ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Has the project been endorsed?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->rdc_endorsed ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>RDC Endorsement Date</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->rdc_endorsed_date ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Physical and Financial Status" id="physical-and-financial-status">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Status of Implementation Readiness</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->project_status->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Updates</label>*/}
                                                    {/*    <x-copy for="updates"></x-copy>*/}
                                                    {/*    </dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <span id="updates">*/}
                                                    {/*{{strip_tags($project->project_update->updates ?? '_')}}*/}
                                                    {/*    </span>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>As of</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->project_update->updates_date ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Will this require resubmission to the ICC?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->icc_resubmission ? 'Yes': 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Implementation Period" id="implementation-period">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Start of Implementation</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->target_start_year}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Year of Project Completion</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->target_end_year}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Philippine Development Plan" id="pdp">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Main philippine*/}
                                                    {/*    Development Chapter</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->pdp_chapter->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Other PDP*/}
                                                    {/*    Chapters</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->pdp_chapters as $chapter)*/}
                                                    {/*    <li>{{$chapter->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Philippine Development Results Matrices (PDP-RM) Indicators" id="pdp-rm-indicators">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Philippine Development Results Matrices (PDP-RM) Indicators</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->pdp_indicators as $indicator)*/}
                                                    {/*    <li>{{$indicator->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <!-- TODO: Add trip indicators -->*/}

                                                    {/*    @if($project->trip)*/}
                                                    {/*    <div className="Box my-5" id="trip-information">*/}
                                                    {/*    <div className="Box-header">*/}
                                                    {/*    <h1 className="Box-title">TRIP Information</h1>*/}
                                                    {/*    </div>*/}

                                                    {/*    <div className="Box-body">*/}
                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Infrastructure Sector</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->infrastructure_sectors as $sector)*/}
                                                    {/*    <li>{{$sector->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Status of Implementation Readiness</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->prerequisites as $prerequisite)*/}
                                                    {/*    <li>{{$prerequisite->name}}</li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected.</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt>*/}
                                                    {/*    <label>Implementation Risks and Mitigation Strategies</label>*/}
                                                    {/*    <x-copy for="risk"></x-copy>*/}
                                                    {/*    </dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <span id="risk">*/}
                                                    {/*{{strip_tags($project->risk->risk) ?? '_'}}*/}
                                                    {/*    </span>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Total Infrastructure Cost by Funding Source">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Total Infrastructure Cost by Funding Source</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2">Funding Source</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2022 *</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2023</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2024</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2025</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2026 &amp; Beyond</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    @foreach($project->fs_infrastructures as $fs_infrastructure)*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <td className="p-2">{{$fs_infrastructure->funding_source->name ?? '_'}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2022 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2023 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2024 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2025 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2026 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_infrastructure->y2022 + $fs_infrastructure->y2023 + $fs_infrastructure->y2024 + $fs_infrastructure->y2025 + $fs_infrastructure->y2026, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    @endforeach*/}
                                                    {/*    </tbody>*/}
                                                    {/*    <tfoot>*/}
                                                    {/*    <th className="p-2 text-left">Total</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_infrastructures->sum('y2022'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_infrastructures->sum('y2023'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_infrastructures->sum('y2024'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_infrastructures->sum('y2025'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_infrastructures->sum('y2026'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{number_format($project->fs_infrastructures->sum('y2022')*/}
                                                    {/*    + $project->fs_infrastructures->sum('y2023')*/}
                                                    {/*    + $project->fs_infrastructures->sum('y2024')*/}
                                                    {/*    + $project->fs_infrastructures->sum('y2025')*/}
                                                    {/*    + $project->fs_infrastructures->sum('y2026'), 2)}}*/}
                                                    {/*    </th>*/}
                                                    {/*    </tfoot>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Total Infrastructure Cost by Region">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Total Infrastructure Cost by Region</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2">Region</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2022 *</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2023</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2024</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2025</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2026 &amp; Beyond</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    @foreach($project->region_infrastructures->sortBy('region.order') as $region_infrastructure)*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <td className="p-2">{{$region_infrastructure->region->name ?? '_'}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2023 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2024 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2025 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2026 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_infrastructure->y2022 + $region_infrastructure->y2023 + $region_infrastructure->y2024 + $region_infrastructure->y2025 + $region_infrastructure->y2026, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    @endforeach*/}
                                                    {/*    </tbody>*/}
                                                    {/*    <tfoot>*/}
                                                    {/*    <tr>*/}
                                                    {/*    <th className="p-2 text-left">Total</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_infrastructures->sum('y2022'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_infrastructures->sum('y2023'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_infrastructures->sum('y2024'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_infrastructures->sum('y2025'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_infrastructures->sum('y2026'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{number_format($project->region_infrastructures->sum('y2022')*/}
                                                    {/*    + $project->region_infrastructures->sum('y2023')*/}
                                                    {/*    + $project->region_infrastructures->sum('y2024')*/}
                                                    {/*    + $project->region_infrastructures->sum('y2025')*/}
                                                    {/*    + $project->region_infrastructures->sum('y2026'), 2)}}*/}
                                                    {/*    </th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tfoot>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}
                                                    {/*    </div>*/}
                                                    {/*    </div>*/}
                                                    {/*    @endif*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Expected Outputs</label></dt>*/}
                                                    {/*    <dd></dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Sustainable Development Goals" id="sdgs">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Sustainable Development Goals</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->sdgs as $sdg)*/}
                                                    {/*    <li>{{$sdg->name}} <br/>*/}
                                                    {/*    <span className="note">{{$sdg->description}}</span>*/}
                                                    {/*    </li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Ten Point Agenda" id="ten-point-agenda">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Ten Point Agenda</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <ul className="pl-4">*/}
                                                    {/*    @forelse($project->ten_point_agendas as $tpa)*/}
                                                    {/*    <li>{{$tpa->name}} <br/><span className="note"> {{$tpa->description}}</span></li>*/}
                                                    {/*    @empty*/}
                                                    {/*    <li>None selected</li>*/}
                                                    {/*    @endforelse*/}
                                                    {/*    </ul>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Project Preparation Details" id="project-preparation-details">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Project Preparation Document</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->preparation_document->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Does the project require feasibility study?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->has_fs ? 'Yes' : 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Status of Feasibility Study (Only if FS is required)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->feasibility_study->fs_status->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Does the conduct of feasibility study need assistance?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->feasibility_study->needs_assistance ? 'Yes': 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Schedule of Feasibility Study Cost (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="p-2 text-right">2017</th>*/}
                                                    {/*    <th className="p-2 text-right">2018</th>*/}
                                                    {/*    <th className="p-2 text-right">2019</th>*/}
                                                    {/*    <th className="p-2 text-right">2020</th>*/}
                                                    {/*    <th className="p-2 text-right">2021</th>*/}
                                                    {/*    <th className="p-2 text-right">2022</th>*/}
                                                    {/*    <th className="p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    <tr>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->feasibility_study->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">*/}
                                                    {/*{{number_format($project->feasibility_study->y2017 ?? 0*/}
                                                    {/*    + $project->feasibility_study->y2018 ?? 0*/}
                                                    {/*    + $project->feasibility_study->y2019 ?? 0*/}
                                                    {/*    + $project->feasibility_study->y2020 ?? 0*/}
                                                    {/*    + $project->feasibility_study->y2021 ?? 0*/}
                                                    {/*    + $project->feasibility_study->y2022 ?? 0, 2)}}*/}
                                                    {/*    </td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tbody>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Expected/Target Date of Completion of FS</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->feasibility_study->completion_date ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Pre-construction Costs" id="preconstruction-costs">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <!-- TODO: Row and Resettlement -->*/}
                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>With ROWA Component?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->has_row ? 'Yes': 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Schedule of ROWA Cost (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="p-2 text-right">2017</th>*/}
                                                    {/*    <th className="p-2 text-right">2018</th>*/}
                                                    {/*    <th className="p-2 text-right">2019</th>*/}
                                                    {/*    <th className="p-2 text-right">2020</th>*/}
                                                    {/*    <th className="p-2 text-right">2021</th>*/}
                                                    {/*    <th className="p-2 text-right">2022</th>*/}
                                                    {/*    <th className="p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    <tr>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->right_of_way->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">*/}
                                                    {/*{{number_format($project->right_of_way->y2017 ?? 0*/}
                                                    {/*    + $project->right_of_way->y2018 ?? 0*/}
                                                    {/*    + $project->right_of_way->y2019 ?? 0*/}
                                                    {/*    + $project->right_of_way->y2020 ?? 0*/}
                                                    {/*    + $project->right_of_way->y2021 ?? 0*/}
                                                    {/*    + $project->right_of_way->y2022 ?? 0, 2)}}*/}
                                                    {/*    </td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tbody>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Affected Households</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->right_of_way->affected_households ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>With Resettlement  Component?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->has_rap ? 'Yes': 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Schedule of Resettlement Cost (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="p-2 text-right">2017</th>*/}
                                                    {/*    <th className="p-2 text-right">2018</th>*/}
                                                    {/*    <th className="p-2 text-right">2019</th>*/}
                                                    {/*    <th className="p-2 text-right">2020</th>*/}
                                                    {/*    <th className="p-2 text-right">2021</th>*/}
                                                    {/*    <th className="p-2 text-right">2022</th>*/}
                                                    {/*    <th className="p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    <tr>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->resettlement_action_plan->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">*/}
                                                    {/*{{number_format($project->resettlement_action_plan->y2017 ?? 0*/}
                                                    {/*    + $project->resettlement_action_plan->y2018 ?? 0*/}
                                                    {/*    + $project->resettlement_action_plan->y2019 ?? 0*/}
                                                    {/*    + $project->resettlement_action_plan->y2020 ?? 0*/}
                                                    {/*    + $project->resettlement_action_plan->y2021 ?? 0*/}
                                                    {/*    + $project->resettlement_action_plan->y2022 ?? 0, 2)}}*/}
                                                    {/*    </td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tbody>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Affected Households</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->resettlement_action_plan->affected_households ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>With ROWA and Resettlement Action Plan?</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->has_row_rap ? 'Yes': 'No'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Employment Generation" id="employment-generation">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>No. of persons to be employed after completion of the project</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->employment_generated ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Funding Source and Mode of Implementation" id="funding-source">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Main Funding Source</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->funding_source->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Funding Institution</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->funding_institution->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Mode of Implementation</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->implementation_mode->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Project Costs" id="project-costs">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Total Investment Required by Funding Source (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2">Funding Source</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2022 *</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2023</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2024</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2025</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2026 &amp; Beyond</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    @foreach($project->fs_investments as $fs_investment)*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <td className="p-2">{{$fs_investment->funding_source->name ?? '_'}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2022 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2023 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2024 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2025 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2026 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($fs_investment->y2022 + $fs_investment->y2023 + $fs_investment->y2024 + $fs_investment->y2025 + $fs_investment->y2026, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    @endforeach*/}
                                                    {/*    </tbody>*/}
                                                    {/*    <tfoot>*/}
                                                    {/*    <th className="p-2 text-left">Total</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_investments->sum('y2022'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_investments->sum('y2023'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_investments->sum('y2024'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_investments->sum('y2025'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->fs_investments->sum('y2026'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{number_format($project->fs_investments->sum('y2022')*/}
                                                    {/*    + $project->fs_investments->sum('y2023')*/}
                                                    {/*    + $project->fs_investments->sum('y2024')*/}
                                                    {/*    + $project->fs_investments->sum('y2025')*/}
                                                    {/*    + $project->fs_investments->sum('y2026'), 2)}}*/}
                                                    {/*    </th>*/}
                                                    {/*    </tfoot>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Total Investment Required by Region (in absolute PhP)</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2">Region</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2022 *</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2023</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2024</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2025</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">2026 &amp; Beyond</th>*/}
                                                    {/*    <th className="col-1 p-2 text-right">Total</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    @foreach($project->region_investments->sortBy('region.order') as $region_investment)*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <td className="p-2">{{$region_investment->region->label ?? '_'}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2022 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2023 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2024 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2025 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2026 ?? 0.00, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($region_investment->y2022 + $region_investment->y2023 + $region_investment->y2024 + $region_investment->y2025 + $region_investment->y2026, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    @endforeach*/}
                                                    {/*    </tbody>*/}
                                                    {/*    <tfoot>*/}
                                                    {/*    <tr>*/}
                                                    {/*    <th className="p-2 text-left">Total</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_investments->sum('y2022'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_investments->sum('y2023'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_investments->sum('y2024'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_investments->sum('y2025'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">{{number_format($project->region_investments->sum('y2026'), 2)}}</th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{number_format($project->region_investments->sum('y2022')*/}
                                                    {/*    + $project->region_investments->sum('y2023')*/}
                                                    {/*    + $project->region_investments->sum('y2024')*/}
                                                    {/*    + $project->region_investments->sum('y2025')*/}
                                                    {/*    + $project->region_investments->sum('y2026'), 2)}}*/}
                                                    {/*    </th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tfoot>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <x-subhead subhead="Financial Accomplishments" id="financial-accomplishments">*/}
                                                    {/*    <x-back-to-top></x-back-to-top>*/}
                                                    {/*    </x-subhead>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>PAP Code</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->pap_code ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Categorization</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->tier->name ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>UACS Code</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*{{$project->uacs_code ?? '_'}}*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    <dl>*/}
                                                    {/*    <dt><label>Financial Status</label></dt>*/}
                                                    {/*    <dd>*/}
                                                    {/*    <table className="col-12 d-table border">*/}
                                                    {/*    <thead>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-3 p-2 text-center">Year</th>*/}
                                                    {/*    <th className="col-3 p-2 text-right">Amount included in the NEP</th>*/}
                                                    {/*    <th className="col-3 p-2 text-right">Amount Allocated in the Budget/GAA</th>*/}
                                                    {/*    <th className="col-3 p-2 text-right">Actual Amount Disbursed</th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </thead>*/}
                                                    {/*    <tbody>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2017</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2017 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2018</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2018 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2019</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2019 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2020</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2020 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2021</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2021 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">2022</th>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->nep->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->allocation->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    <td className="p-2 text-right">{{number_format($project->disbursement->y2022 ?? 0, 2)}}</td>*/}
                                                    {/*    </tr>*/}
                                                    {/*    <tr className="border-bottom">*/}
                                                    {/*    <th className="col-1 p-2 text-center">Total</th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{*/}
                                                    {/*    number_format(($project->nep->y2016 ?? 0)*/}
                                                    {/*    + ($project->nep->y2017 ?? 0)*/}
                                                    {/*    + ($project->nep->y2018 ?? 0)*/}
                                                    {/*    + ($project->nep->y2019 ?? 0)*/}
                                                    {/*    + ($project->nep->y2020 ?? 0)*/}
                                                    {/*    + ($project->nep->y2021 ?? 0)*/}
                                                    {/*    + ($project->nep->y2022 ?? 0)*/}
                                                    {/*    + ($project->nep->y2023 ?? 0), 2)*/}
                                                    {/*}}*/}
                                                    {/*    </th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{*/}
                                                    {/*    number_format(($project->allocation->y2016 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2017 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2018 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2019 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2020 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2021 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2022 ?? 0)*/}
                                                    {/*    + ($project->allocation->y2023 ?? 0), 2)*/}
                                                    {/*}}*/}
                                                    {/*    </th>*/}
                                                    {/*    <th className="p-2 text-right">*/}
                                                    {/*{{*/}
                                                    {/*    number_format(($project->disbursement->y2016 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2017 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2018 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2019 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2020 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2021 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2022 ?? 0)*/}
                                                    {/*    + ($project->disbursement->y2023 ?? 0), 2)*/}
                                                    {/*}}*/}
                                                    {/*    </th>*/}
                                                    {/*    </tr>*/}
                                                    {/*    </tbody>*/}
                                                    {/*    </table>*/}
                                                    {/*    </dd>*/}
                                                    {/*    </dl>*/}

                                                    {/*    </div>*/}
                                                    {/*    </div>*/}
        </Authenticated>
    )
}

export default ProjectsShow