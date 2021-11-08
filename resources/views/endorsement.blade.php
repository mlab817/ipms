@extends('layouts.print-only')

@section('content')
    <p style="margin-top: 60px;">{{ date('F d, Y') }}</p>

    <p style="padding-top: 10px;"><strong>DR. WILLIAM D. DAR</strong><br/>
    Secretary<br/>
    Department of Agriculture<br/>
    Elliptical Road, Diliman, Quezon City</p>

    <p style="padding-top: 10px;">Dear <strong>Secretary Dar:</strong></p>

    <p style="padding-top: 10px;">This is to endorse, for inclusion in the 2023-2025 Three-Year Rolling Infrastructure Program (TRIP), the
        following priority programs and projects of the {{ $office->acronym }} as encoded and endorsed in the Public Investment Program System (PIPS):
    </p>

    <table style="margin-top: 10px;">
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
            @foreach($byStatus as $status)
                <tr>
                    <td colspan="5" style="padding: 5px 2px !important;">
                        <strong>
                            {{ $status->name }} PAPs
                        </strong>
                    </td>
                </tr>
                @forelse($status->projects as $project)
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
                            No program or project has been {{ strtolower($status->name) }} in the PIPS.
                        </td>
                    </tr>
                @endforelse
            @endforeach
        </tbody>
    </table>

    <p style="padding-top: 10px;">Warm regards.</p>

    <p style="padding-top: 10px;">Very truly yours,</p>


    <p style="padding-top: 40px;">
        <strong>{{ strtoupper($office->office_head_name) }} </strong><br/>
        {{ $office->name }}
    </p>
@endsection