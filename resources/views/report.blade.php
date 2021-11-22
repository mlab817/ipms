@extends('layouts.app')

@php($project = (new \App\Models\Project)->where('ref_pipol_status_id', 2));

@section('content')
    <div class="container-lg">
        <h1>Report</h1>

        <p>
            There are a total of {{ $project->count() }} PAPs
            endorsed in the PIPOL System of which {{ $programs }}
            are programs and {{ $projects }} are projects. The total cost
            of these PAPs is PhP {{ format_money($totalProjectCost) }}.
            On the other hand, the total cost for FY 2023 amounts to PhP {{ format_money($total2023) }}.
        </p>

        <p class="mt-5">
            The top five PAPs in terms of cost are:
        </p>

        <table class="table border-bottom">
            <thead>
                <tr class="border-bottom border-top">
                    <th class="p-2">Title</th>
                    <th class="p-2">Program or Project</th>
                    <th class="p-2">Total Cost (PhP)</th>
                </tr>
            </thead>
            <tbody>
            @foreach($top5 as $top)
                <tr>
                    <td class="p-2">{{ $top->title }}</td>
                    <td class="p-2">{{ $top->pap_type->name }}</td>
                    <td class="text-right p-2">{{ format_money($top->total_project_cost) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p class="mt-5">
            For FY 2023, the top five PAPs in terms of cost are:
        </p>

        <table class="table border-bottom">
            <thead>
            <tr class="border-bottom border-top">
                <th class="p-2">Title</th>
                <th class="p-2">Program or Project</th>
                <th class="p-2">Total Cost (PhP)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($top5_2023 as $top)
                <tr>
                    <td class="p-2">{{ $top->title }}</td>
                    <td class="p-2">{{ $top->pap_type }}</td>
                    <td class="text-right p-2">{{ format_money($top->y2023) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection