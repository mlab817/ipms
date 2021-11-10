@extends('layouts.print-only')

@section('content')
    <p style="margin-top: 100px;">{{ date('F d, Y') }}</p>

    <p style="padding-top: 10px;"><span class="strong">DR. WILLIAM D. DAR</span><br/>
    Secretary<br/>
    Department of Agriculture<br/>
    Elliptical Road, Diliman, Quezon City</p>

    <table style="width: 100%; margin-left: 100px; padding-top: 10px; border: 0 !important;">
        <tbody>
            <tr class="border: 0 !important;">
                <td style="vertical-align: top; border: 0 !important;"><span class="strong">ATTN: </span></td>
                <td style="width: 90%; vertical-align: top; border: 0 !important;">
                    <span class="strong">MS. AGNES CATHERINE T. MIRANDA</span><br/>
                    Assistant Secretary-designate for Planning and Project Development and <br/>
                    Director for Planning and Monitoring Service
                </td>
            </tr>
        </tbody>
    </table>

    <p style="padding-top: 10px;">Dear <span class="strong">Secretary Dar:</span></p>

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
                    <span class="strong">
                        Endorsed PAPs
                    </span>
                </td>
            </tr>
            @forelse($endorsedProjects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
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
                    <span class="strong">
                        Dropped PAPs
                    </span>
                </td>
            </tr>
            @forelse($droppedProjects as $project)
                <tr>
                    <td>{{ $project->title }}</small></td>
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
                    <span class="strong">
                        Neither Endorsed or Dropped PAPs
                    </span>
                </td>
            </tr>
            @forelse($draftProjects as $project)
                <tr>
                    <td>{{ $project->title }}</small></td>
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
        <span class="strong">{{ strtoupper($office->office_head_name) }} </span><br/>
        {{ $office->name }}
    </p>

    <footer>
        <small>
            This letter was system-generated on {{ now() }}.
        </small>
    </footer>
@endsection