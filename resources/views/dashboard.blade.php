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
                <div class="col-12 col-md-6 px-3 py-4">
                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ join(', ', $bySubmissionStatus->map(function($ss) {
                        return $ss->projects_count . ' ' . strtolower($ss->name);
                    })->toArray()) }}">
                        <span class="Progress">
                        @foreach($bySubmissionStatus as $status)
                                <span class="Progress-item color-bg-success-emphasis"
                                      style="width: {{ round($status->projects_count / $bySubmissionStatus->sum('projects_count') * 100) }}%" aria-label="View all {{ strtolower($status->name) }}" projects></span>
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">{{ $bySubmissionStatus->sum('projects_count') }}</span>
                        PAPs
                    </div>
                </div>

                <div class="col-12 col-md-6 px-3 py-4">
                    <div class="Progress">

                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">{{ \App\Models\Project::whereHas('issue')->count() }}</span>
                        PAPs with issues
                    </div>
                </div>
            </li>

            <li class="Box-row p-0">
                <ul class="list-style-none text-center d-flex flex-wrap">
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-right border-md-bottom-0 color-border-muted">
                <span class="d-block h4 color-fg-default">
                  <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-git-merge color-fg-done">
    <path fill-rule="evenodd" d="M5 3.254V3.25v.005a.75.75 0 110-.005v.004zm.45 1.9a2.25 2.25 0 10-1.95.218v5.256a2.25 2.25 0 101.5 0V7.123A5.735 5.735 0 009.25 9h1.378a2.251 2.251 0 100-1.5H9.25a4.25 4.25 0 01-3.8-2.346zM12.75 9a.75.75 0 100-1.5.75.75 0 000 1.5zm-8.5 4.5a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
</svg>
                  0
                </span>
                        <span class="color-fg-muted">Merged Pull Requests</span>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-md-bottom-0 border-md-right color-border-muted">
              <span class="d-block h4">
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-git-pull-request color-icon-success">
    <path fill-rule="evenodd" d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"></path>
</svg>
                0
              </span>
                        <span class="color-fg-muted">Open Pull Requests</span>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3 border-bottom border-sm-bottom-0 border-sm-right color-border-muted">
                        <a href="#closed-issues" class="d-block Link--muted">
                            <span class="d-block h4 color-fg-default">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-issue-closed color-icon-danger">
                                    <path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path>
                                </svg>
                                2
                            </span>
                            <span class="color-fg-muted">Closed Issues</span>
                        </a>
                    </li>
                    <li class="p-3 col-12 col-sm-6 col-md-3">
                        <a href="#new-issues" class="d-block Link--muted">
                            <span class="d-block h4 color-fg-default">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-issue-opened color-icon-success">
                                    <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                </svg>
                                3
                            </span>
                            <span class="color-fg-muted">New Issues</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
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

{{--@push('scripts')--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}

{{--    <script>--}}
{{--        const labels = @json(\App\Models\RefFundingSource::all()->pluck('name')->toArray())--}}

{{--        const data = {--}}
{{--            labels: labels,--}}
{{--            datasets: [{--}}
{{--                label: 'No. of Projects by Fund Source',--}}
{{--                backgroundColor: '#2da44e',--}}
{{--                borderColor: '#2da44e',--}}
{{--                data: @json(\App\Models\RefFundingSource::withCount('projects')->get()->pluck('projects_count')->toArray()),--}}
{{--            }]--}}
{{--        };--}}

{{--        const config = {--}}
{{--            type: 'bar',--}}
{{--            data: data,--}}
{{--            options: {--}}
{{--                scales: {--}}
{{--                    y: {--}}
{{--                        beginAtZero: true--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}
{{--        };--}}

{{--        var myChart = new Chart(--}}
{{--            document.getElementById('chart1'),--}}
{{--            config--}}
{{--        );--}}
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
{{--    </script>--}}

{{--@endpush--}}