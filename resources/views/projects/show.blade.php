@extends('layouts.app')

@section('content')
    <div class="Box">
        <div class="Box-header">
            <div class="d-flex flex-items-center">
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
        </div>
        <div class="Box-body">
            <x-subhead subhead="General Information"></x-subhead>

            <dl>
                <dt><label>Office</label></dt>
                <dd>{{ $project->office->name }}</dd>
            </dl>

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
                <dt><label>Does this PAP have INFRASTRUCTURE component/s?</label></dt>
                <dd>{{ $project->has_infra ? 'Yes' : 'No' }}</dd>
            </dl>

            <dl>
                <dt><label>Basis for Implementation</label></dt>
                <dd>
                    <ul class="pl-4">
                    @foreach($project->bases as $basis)
                        <li>{{ $basis->name }}</li>
                    @endforeach
                    </ul>
                </dd>
            </dl>

            <dl>
                <dt><label>Description</label></dt>
                <dd>{{ strip_tags($project->description->description) }}</dd>
            </dl>

            <dl>
                <dt><label>Expected Outputs</label></dt>
                <dd>{{ strip_tags($project->expected_output->expected_outputs) }}</dd>
            </dl>

            <dl>
                <dt><label>Total Project Cost</label></dt>
                <dd>PhP {{ number_format($project->total_project_cost, 2) }}</dd>
            </dl>

            <dl>
                <dt><label>Project Status</label></dt>
                <dd>{{ $project->project_status->name }}</dd>
            </dl>

            <x-subhead subhead="Implementing Agencies">
                <x-back-to-top></x-back-to-top>
            </x-subhead>

            <dl>
                <dt><label>Implementing Agencies</label></dt>
                <dd>
                    <ul class="pl-4">
                        @foreach($project->operating_units as $ou)
                            <li>{{ $ou->name }}</li>
                        @endforeach
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
                        @foreach($project->regions as $region)
                            <li>{{ $region->name }}</li>
                        @endforeach
                    </ul>
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

            <x-subhead subhead="Regional Development Investment Program">
                <x-back-to-top></x-back-to-top>
            </x-subhead>

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

            <x-subhead subhead="Employment Generation">
                <x-back-to-top></x-back-to-top>
            </x-subhead>

            <dl>
                <dt><label>No. of persons to be employed after completion of the project</label></dt>
                <dd>
                    {{ $project->employment_generated ?? '_' }}
                </dd>
            </dl>

        </div>
    </div>

    <section class="content">
        <!-- Default box -->

        @include('projects.project-details', ['project' => $project , 'pdp_indicators' => \App\Models\RefPdpIndicator::with('children.children')->whereNull('parent_id')->get()])

    </section>
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
