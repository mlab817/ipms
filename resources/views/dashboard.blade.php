@extends('layouts.app')

@section('page-header')
    <div class="color-bg-subtle">
        <div class="border-bottom">
            <div class="container-lg d-flex flex-justify-between py-6">
                <div class="flex-auto">
                    <h1 class="h1">Dashboard</h1>
                    <span class="tooltipped tooltipped-n IssueLabel IssueLabel--big color-bg-accent-emphasis color-fg-on-emphasis" aria-label="Your dashboard is based on this role context">
                        <!-- <%= octicon "issue-opened" %> -->
                        <svg class="octicon octicon-issue-opened" viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg>
                        {{ auth()->user()->role->name }}</span>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h3 class="Box-title">Overview</h3>
        </div>

        <ul>
            <li class="Box-row p-0 d-flex flex-wrap">
                <div class="col-12 col-md-4 px-3 py-4">
                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ join(', ', $bySubmissionStatus->map(function($ss) {
                        return $ss->projects_count . ' ' . strtolower($ss->name);
                    })->toArray()) }}">
                        <span class="Progress">
                            @foreach($bySubmissionStatus as $status)
                                <span class="Progress-item color-bg-{{ strtolower($status->name) }}-emphasis"
                                      style="width: {{ round($status->projects_count / \App\Models\Project::count() * 100) }}%" aria-label="View all {{ strtolower($status->name) }}"> projects</span>
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">{{ \App\Models\Project::count() }}</span>
                        PAPs
                    </div>
                </div>

                <div class="col-12 col-md-4 px-3 py-4">
                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ \App\Models\Project::whereNotNull('validated_at')->count() . ' of ' . \App\Models\Project::count() }} validated">
                        <div class="Progress">
                            <span class="Progress-item color-bg-success-emphasis"
                                  style="width: {{ round(\App\Models\Project::whereNotNull('validated_at')->count() / \App\Models\Project::count() * 100) }}%"></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">
                            {{ \App\Models\Project::count() }}</span>
                         PAPs
                    </div>
                </div>

                <div class="col-12 col-md-4 px-3 py-4">
                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ join(', ', $byPipolStatus->pluck('label')->toArray()) }}">
                        <span class="Progress">
                            @foreach($byPipolStatus as $status)
                                <span class="Progress-item color-bg-{{ strtolower($status->name) }}-emphasis"
                                      style="width: {{ round($status->projects_count / \App\Models\Project::count() * 100) }}%" aria-label="View all {{ strtolower($status->name) }}"> projects</span>
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">
                            {{ \App\Models\Project::count() }}</span>
                        PAPs
                    </div>
                </div>
            </li>

            <li class="Box-row d-flex flex-items-center p-0 color-bg-subtle p-2">
                <h3 class="Box-title">
                    PIPS Status Details
                </h3>
                <span class="flex-auto"></span>
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary class="btn btn-sm">
                        Learn more
                    </summary>
                    <details-dialog class="Box-overlay">
                        <div class="Box">
                            <div class="Box-header">
                                <h3 class="Box-title">PIPS Status Details</h3>
                            </div>
                            <div class="Box-body">
                                <p>
                                    PIPS Status details show the status of PAPs in the PIPS as follows:
                                </p>
                                <ul class="ml-4">
                                    <li>Draft - the PAP is still draft</li>
                                    <li>Endorsed - the PAP has been endorsed by the user</li>
                                    <li>Dropped - the PAP has been dropped by the user</li>
                                    <li>Validated - the PAP has been validated by the IPD</li>
                                </ul>
                                <p class="note">
                                    Note: Unlike the PIPOL status where they are expected to be sequential, in the
                                    PIPS, PAPs can be validated by the IPD regardless of the PIPS status.
                                </p>
                            </div>
                        </div>
                    </details-dialog>
                </details>
            </li>

            <li class="Box-row p-0">
                <ul class="list-style-none text-center d-flex flex-wrap">
                    @foreach($bySubmissionStatus as $status)
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-right border-md-bottom-0 color-border-muted">
                        <span class="d-block h4 color-text-{{ strtolower($status->name) }}">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-git-merge" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 3.254V3.25v.005a.75.75 0 110-.005v.004zm.45 1.9a2.25 2.25 0 10-1.95.218v5.256a2.25 2.25 0 101.5 0V7.123A5.735 5.735 0 009.25 9h1.378a2.251 2.251 0 100-1.5H9.25a4.25 4.25 0 01-3.8-2.346zM12.75 9a.75.75 0 100-1.5.75.75 0 000 1.5zm-8.5 4.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                            </svg>
                            {{ $status->projects_count }}
                        </span>

                        <span class="color-fg-muted">
                            <a href="{{ route('projects.index', ['status' => $status->name]) }}">{{ $status->name }} PAPs</a></span>
                    </li>
                    @endforeach

                    <li class="p-3 col-12 col-sm-6 col-md-3">
                        <a href="#validated-paps" class="d-block Link--muted">
                            <span class="d-block h4 color-fg-default">
                                <svg class="octicon octicon-checklist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">
                                    <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                </svg>
                                {{ \App\Models\Project::whereNotNull('validated_at')->count() }}
                            </span>
                            <span class="color-fg-muted">
                                <a href="{{ route('projects.index',['validated' => 1]) }}">
                                    Validated PAPs
                                </a>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="Box-row d-flex p-0 color-bg-success p-2">
                <h3 class="Box-title">
                    PIPOL Status Details
                </h3>
                <span class="flex-auto"></span>
                <details class="details-reset details-overlay details-overlay-dark">
                    <summary class="btn btn-sm">
                        Learn more
                    </summary>
                    <details-dialog class="Box-overlay">
                        <div class="Box">
                            <div class="Box-header">
                                <h3 class="Box-title">PIPOL Status Details</h3>
                            </div>
                            <div class="Box-body">
                                <p>
                                    PIPOL Status details show the status of PAPs in the NEDA-PIPOL as follows:
                                </p>
                                <ul class="ml-4">
                                    <li>Draft - the PAP has been encoded into the PIPOL System</li>
                                    <li>Endorsed - the PAP has been endorsed by the IPD to the PIPOL System</li>
                                    <li>Dropped - the PAP has been dropped by the IPD from the PIPOL System</li>
                                    <li>Validated - the PAP has been validated by the concerned NEDA Secretariat office</li>
                                </ul>
                                <p class="note">
                                    Note: NEDA validation may take some time to reflect as these usually take place after the updating
                                    activity.
                                </p>
                            </div>
                        </div>
                    </details-dialog>
                </details>
            </li>

            <li class="Box-row p-0">
                <ul class="list-style-none text-center d-flex flex-wrap">
                    @foreach($byPipolStatus as $status)
                        <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-right border-md-bottom-0 color-border-muted">
                        <span class="d-block h4 color-text-{{ strtolower($status->name) }}">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-git-merge" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 3.254V3.25v.005a.75.75 0 110-.005v.004zm.45 1.9a2.25 2.25 0 10-1.95.218v5.256a2.25 2.25 0 101.5 0V7.123A5.735 5.735 0 009.25 9h1.378a2.251 2.251 0 100-1.5H9.25a4.25 4.25 0 01-3.8-2.346zM12.75 9a.75.75 0 100-1.5.75.75 0 000 1.5zm-8.5 4.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
                            </svg>
                            {{ $status->projects_count }}
                        </span>
                            <span class="color-fg-muted">
                                <a href="{{ route('projects.index', ['pipol' => $status->name]) }}">
                                    {{ $status->name }} PAPs
                                </a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>

    <div class="Box mt-5">
        <div class="Box-header">
            <h3 class="Box-title">Infrastructure Cost by Regions</h3>
        </div>
        <div class="Box-body">
            <canvas id="chart"></canvas>
        </div>
    </div>

{{--    <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4 js-pinned-items-reorder-list">--}}
{{--        @foreach($bySubmissionStatus as $status)--}}
{{--        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-4 col-lg-3">--}}
{{--            <div class="Box d-flex pinned-item-list-item p-3 width-full js-pinned-item-list-item public sortable-button-item source">--}}
{{--                <div class="pinned-item-list-item-content">--}}
{{--                    <div class="d-flex width-full flex-items-center position-relative">--}}
{{--                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo mr-2 color-text-secondary flex-shrink-0">--}}
{{--                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>--}}
{{--                        </svg>--}}
{{--                        <a class="text-bold flex-auto min-width-0 " href="{{ route('projects.index', ['status' => $status->name ]) }}">--}}
{{--                            <span class="repo" title="pips">{{ $status->name }}</span>--}}
{{--                        </a>--}}
{{--                        <span class="Label Label--secondary v-align-middle ml-1">--}}
{{--                            {{ $status->projects_count }}--}}
{{--                        </span>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        @endforeach--}}
{{--        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-4 col-lg-3">--}}
{{--            <div class="Box d-flex pinned-item-list-item p-3 width-full js-pinned-item-list-item public sortable-button-item source">--}}
{{--                <div class="pinned-item-list-item-content">--}}
{{--                    <div class="d-flex width-full flex-items-center position-relative">--}}
{{--                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo mr-2 color-text-secondary flex-shrink-0">--}}
{{--                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>--}}
{{--                        </svg>--}}
{{--                        <a class="text-bold flex-auto min-width-0 " href="#">--}}
{{--                            <span class="repo" title="pips">Validated</span>--}}
{{--                        </a>--}}
{{--                        <span class="Label Label--secondary v-align-middle ml-1">--}}
{{--                        {{ $validated }}--}}
{{--                    </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--    </ol>--}}

{{--    <div class="col-12 d-flex flex-wrap gutter-md">--}}
{{--        <div class="col-6">--}}
{{--            <canvas id="chart1"></canvas>--}}
{{--        </div>--}}

{{--        <div class="col-6">--}}
{{--            <canvas id="chart2"></canvas>--}}
{{--        </div>--}}

{{--        <div class="col-6">--}}
{{--            <canvas id="chart3"></canvas>--}}
{{--        </div>--}}

{{--        <div class="col-6">--}}
{{--            <canvas id="chart4"></canvas>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let labels = @json($infraCostByRegion->pluck('region')->toArray())

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Infra Cost by Region',
                backgroundColor: '#2da44e',
                borderColor: '#2da44e',
                data: @json($infraCostByRegion->map(function ($ic) {
                        return floatval($ic->y2022);
                    })->toArray()),
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var myChart = new Chart(
            document.getElementById('chart'),
            config
        );
{{--    </script>--}}

{{--    <script>--}}
{{--        var ctx = document.getElementById('chart2').getContext('2d');--}}
{{--        var myChart = new Chart(ctx, {--}}
{{--            type: 'doughnut',--}}
{{--            data: {--}}
{{--                labels: @json(\App\Models\RefSubmissionStatus::all()->pluck('name')->toArray()),--}}
{{--                datasets: [{--}}
{{--                    label: 'No. of PAPs per submission status',--}}
{{--                    data: @json(\App\Models\RefSubmissionStatus::withCount('projects')->get()->pluck('projects_count')->toArray()),--}}
{{--                    backgroundColor: [--}}
{{--                        'rgb(255, 99, 132)',--}}
{{--                        'rgb(54, 162, 235)',--}}
{{--                        'rgb(255, 205, 86)'--}}
{{--                    ],--}}
{{--                    borderColor: [--}}
{{--                        'rgba(255, 99, 132, 1)',--}}
{{--                        'rgba(54, 162, 235, 1)',--}}
{{--                        'rgba(255, 206, 86, 1)',--}}
{{--                        'rgba(75, 192, 192, 1)',--}}
{{--                        'rgba(153, 102, 255, 1)',--}}
{{--                        'rgba(255, 159, 64, 1)'--}}
{{--                    ],--}}
{{--                    borderWidth: 1,--}}
{{--                    hoverOffset: 4--}}
{{--                }]--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        var ctx = document.getElementById('chart3').getContext('2d');--}}
{{--        var myChart = new Chart(ctx, {--}}
{{--            type: 'doughnut',--}}
{{--            data: {--}}
{{--                labels: @json(\App\Models\RefSubmissionStatus::all()->pluck('name')->toArray()),--}}
{{--                datasets: [{--}}
{{--                    label: 'No. of PAPs per submission status',--}}
{{--                    data: @json(\App\Models\RefSubmissionStatus::withCount('projects')->get()->pluck('projects_count')->toArray()),--}}
{{--                    backgroundColor: [--}}
{{--                        'rgb(255, 99, 132)',--}}
{{--                        'rgb(54, 162, 235)',--}}
{{--                        'rgb(255, 205, 86)'--}}
{{--                    ],--}}
{{--                    borderColor: [--}}
{{--                        'rgba(255, 99, 132, 1)',--}}
{{--                        'rgba(54, 162, 235, 1)',--}}
{{--                        'rgba(255, 206, 86, 1)',--}}
{{--                        'rgba(75, 192, 192, 1)',--}}
{{--                        'rgba(153, 102, 255, 1)',--}}
{{--                        'rgba(255, 159, 64, 1)'--}}
{{--                    ],--}}
{{--                    borderWidth: 1,--}}
{{--                    hoverOffset: 4--}}
{{--                }]--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        var ctx = document.getElementById('chart4').getContext('2d');--}}
{{--        var myChart = new Chart(ctx, {--}}
{{--            type: 'doughnut',--}}
{{--            data: {--}}
{{--                labels: @json(\App\Models\RefSubmissionStatus::all()->pluck('name')->toArray()),--}}
{{--                datasets: [{--}}
{{--                    label: 'No. of PAPs per submission status',--}}
{{--                    data: @json(\App\Models\RefSubmissionStatus::withCount('projects')->get()->pluck('projects_count')->toArray()),--}}
{{--                    backgroundColor: [--}}
{{--                        'rgb(255, 99, 132)',--}}
{{--                        'rgb(54, 162, 235)',--}}
{{--                        'rgb(255, 205, 86)'--}}
{{--                    ],--}}
{{--                    borderColor: [--}}
{{--                        'rgba(255, 99, 132, 1)',--}}
{{--                        'rgba(54, 162, 235, 1)',--}}
{{--                        'rgba(255, 206, 86, 1)',--}}
{{--                        'rgba(75, 192, 192, 1)',--}}
{{--                        'rgba(153, 102, 255, 1)',--}}
{{--                        'rgba(255, 159, 64, 1)'--}}
{{--                    ],--}}
{{--                    borderWidth: 1,--}}
{{--                    hoverOffset: 4--}}
{{--                }]--}}
{{--            }--}}
{{--        });--}}
    </script>

@endpush