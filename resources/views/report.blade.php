@extends('layouts.app')

@section('page-header')
    <x-page-header header="Report"></x-page-header>
@endsection

@section('content')
    <div class="container-lg">
        <p>Intro spiel</p>

        <p class="my-5">
            As of November 22, 2021, the IPD was able to endorse
            {{ \App\Models\Project::pipolEndorsed()->count() }}.
            These consists of {{ \App\Models\Project::pipolEndorsed()->program()->count() }} programs
            and {{ \App\Models\Project::pipolEndorsed()->project()->count() }} projects.
        </p>

        <p class="my-5">
            The total investment requirement for FY 2023 is PhP {{
                    format_money(\Illuminate\Support\Facades\DB::table('project_fs_investments')
                        ->whereIn('project_id', \App\Models\Project::pipolEndorsed()->pluck('id')->toArray())
                        ->selectRaw('SUM(y2023) AS y2023')
                        ->get()
                        ->pluck('y2023')[0])
                }}. By funding source, the breakdown is shown below:
        </p>

        <p class="my-5"></p>

        <table class="table width-full border-y">
            <thead>
                <tr>
                    <th rowspan="2">Funding Source</th>
                    <th class="text-center" colspan="3">Investment Targets (in 000 PhP)</th>
                </tr>
                <tr class="border-bottom">
                    <th class="text-right p-2">FY 2023</th>
                    <th class="text-right p-2">FY 2024</th>
                    <th class="text-right p-2">FY 2025</th>
                </tr>
            </thead>
            <tbody>
            @foreach($fundingSources as $fs)
                <tr>
                    <td class="p-2">{{ $fs->fs }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2023 / 1000, 2) }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2024 / 1000, 2) }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2025 / 1000, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-left p-2">Total</th>
                    <th class="text-right p-2">{{ number_format($fundingSources->sum('y2023') / 1000, 2) }}</th>
                    <th class="text-right p-2">{{ number_format($fundingSources->sum('y2024') / 1000, 2) }}</th>
                    <th class="text-right p-2">{{ number_format($fundingSources->sum('y2025') / 1000, 2) }}</th>
                </tr>
            </tfoot>
        </table>

        <p class="my-5">By region, the breakdown is shown below: </p>

        <table class="table width-full border-y">
            <thead>
                <tr>
                    <th rowspan="2">Region</th>
                    <th class="text-center" colspan="3">Investment Targets (in 000 PhP)</th>
                </tr>
                <tr class="border-bottom">
                    <th class="text-right p-2">FY 2023</th>
                    <th class="text-right p-2">FY 2024</th>
                    <th class="text-right p-2">FY 2025</th>
                </tr>
            </thead>
            <tbody>
            @foreach($regions as $fs)
                <tr>
                    <td class="p-2">{{ $fs->region }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2023 / 1000, 2) }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2024 / 1000, 2) }}</td>
                    <td class="text-right p-2">{{ number_format($fs->y2025 / 1000, 2) }}</td>
{{--                    <td class="text-right p-2">{{ number_format($fs->region_investments_sum_y2023 / $regions->sum('region_investments_sum_y2023') * 100, 2) }}</td>--}}

                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th class="text-left p-2">Total</th>
                <th class="text-right p-2">{{ number_format($regions->sum('y2023') / 1000, 2) }}</th>
                <th class="text-right p-2">{{ number_format($regions->sum('y2024') / 1000, 2) }}</th>
                <th class="text-right p-2">{{ number_format($regions->sum('y2025') / 1000, 2) }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@push('scripts')

@endpush