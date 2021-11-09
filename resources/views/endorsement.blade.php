@extends('layouts.print-only')

@section('content')
    <p style="margin-top: 60px;">{{ date('F d, Y') }}</p>

    <p style="padding-top: 10px;"><strong>DR. WILLIAM D. DAR</strong><br/>
    Secretary<br/>
    Department of Agriculture<br/>
    Elliptical Road, Diliman, Quezon City</p>

    <p style="padding-top: 10px; margin-left: 100px;">
        <strong>ATTN: AGNES CATHERINE T. MIRANDA</strong><br/>
        Assistant Secretary-designate for Planning and Project Development and <br/>
        Director for Planning and Monitoring Service
    </p>

    <p style="padding-top: 10px;">Dear <strong>Secretary Dar:</strong></p>

    <p style="padding-top: 10px;">
        Greetings!
    </p>

    <p style="padding-top: 10px;">
        This has reference to the FY 2021 Updating of the 2023-2025 Three-Year Rolling Infrastructure Program (TRIP) as input to the FY 2023 Budget. This is to endorse,
        for inclusion through the NEDA Public Investment Program Online (NEDA PIPOL) System, the following priority programs and projects of the
        {{ $office->name }} ({{ $office->acronym }}) as encoded and endorsed in the DA Public Investment Program System (DA PIPS):
    </p>

    <table style="margin-top: 10px; width: 100%;">
        <thead>
            <tr>
                <th>Program/Project</th>
                <th>Spatial Coverage</th>
                <th>Implementation Period</th>
                <th>FY 2023 Infrastructure Cost (in PhP)</th>
                <th>Total Project Cost (in PhP)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5" style="padding: 5px 2px !important;">
                    <strong>
                        Endorsed PAPs
                    </strong>
                </td>
            </tr>
            @forelse($endorsedProjects as $project)
                <tr>
                    <td>{{ $project->title }} <br/><small>({{ $project->pap_type->name }})</small></td>
                    <td>{{ $project->spatial_coverage->name }}</td>
                    <td class="text-center">{{ $project->target_start_year . ' - ' . $project->target_end_year }}</td>
                    <td class="text-right">{{ number_format($project->fs_infrastructures->sum('y2023')) }}</td>
                    <td class="text-right">{{ number_format($project->total_project_cost) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="color: red; text-align: center; padding: 5px 0 !important;">
                        No program or project has been endorsed in the DA PIPS.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if(count($droppedProjects) > 0)
    <p style="padding-top: 10px;">
        On the other hand, the following programs and projects that were marked as dropped in the DA PIPS will likewise be
        dropped in the NEDA PIPOL System, if previously submitted:
    </p>

    <table style="margin-top: 10px; width: 100%;">
        <thead>
        <tr>
            <th>Program/Project</th>
{{--            <th>Spatial Coverage</th>--}}
{{--            <th>Implementation Period</th>--}}
{{--            <th>FY 2023 Infrastructure Cost (in PhP)</th>--}}
{{--            <th>Total Project Cost (in PhP)</th>--}}
            <th>Reason for Dropping</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" style="padding: 5px 2px !important;">
                    <strong>
                        Dropped PAPs
                    </strong>
                </td>
            </tr>
            @forelse($droppedProjects as $project)
                <tr>
                    <td>{{ $project->title }} <br/><small>({{ $project->pap_type->name }})</small></td>
{{--                    <td>{{ $project->spatial_coverage->name }}</td>--}}
{{--                    <td class="text-center">{{ $project->target_start_year . ' - ' . $project->target_end_year }}</td>--}}
{{--                    <td class="text-right">{{ number_format($project->fs_infrastructures->sum('y2023')) }}</td>--}}
{{--                    <td class="text-right">{{ number_format($project->total_project_cost) }}</td>--}}
                    <td>{{ $project->reason_for_dropping }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="color: red; text-align: center; padding: 5px 0 !important;">
                        No program or project has been dropped in the DA PIPS.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @endif

    @if(count($draftProjects) > 0)
    <p style="padding-top: 10px;">
        It is understood that the following programs and projects that were neither endorsed or dropped in the DA PIPS will not be
        considered for submission in the NEDA PIPOL System and if previously submitted will be dropped in the NEDA PIPOL System:
    </p>

    <table style="margin-top: 10px; width: 100% !important;">
        <thead>
        <tr>
            <th>Program/Project</th>
            <th>Spatial Coverage</th>
            <th>Implementation Period</th>
            <th>FY 2023 Infrastructure Cost (in PhP)</th>
            <th>Total Project Cost (in PhP)</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="5" style="padding: 5px 2px !important;">
                    <strong>
                        Neither Endorsed or Dropped PAPs
                    </strong>
                </td>
            </tr>
            @forelse($draftProjects as $project)
                <tr>
                    <td>{{ $project->title }} <br/><small>({{ $project->pap_type->name }})</small></td>
                    <td>{{ $project->spatial_coverage->name }}</td>
                    <td class="text-center">{{ $project->target_start_year . ' - ' . $project->target_end_year }}</td>
                    <td class="text-right">{{ number_format($project->fs_infrastructures->sum('y2023')) }}</td>
                    <td class="text-right">{{ number_format($project->total_project_cost) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="color: red; text-align: center; padding: 5px 0 !important;">
                        No program or project that were neither endorsed or dropped.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @endif

    <p style="padding-top: 10px;">
        It is understood that the above programs and projects are still subject to the validation of the Investment Programming Division (IPD) staff
        as well as the NEDA Infrastructure Staff.
    </p>

    <p style="padding-top: 10px;">For your consideration.</p>

    <p style="padding-top: 10px;">Very truly yours,</p>

    <p style="padding-top: 40px;">
        <strong>{{ strtoupper($office->office_head_name) }} </strong><br/>
        {{ $office->name }}
    </p>

    <footer>
        <small>
            This letter was system-generated on {{ now() }}.
        </small>
    </footer>
@endsection