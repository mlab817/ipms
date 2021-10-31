@extends('layouts.app')

@section('page-header')
    @if(! \Carbon\Carbon::create(config('ipms.deadline'))->isPast())
        <div class="flash flash-warn flash-full border-top-0 text-center text-bold py-2">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-megaphone mr-1 color-text-tertiary">
                <g fill-rule="evenodd"><path d="M3.25 9a.75.75 0 01.75.75c0 2.142.456 3.828.733 4.653a.121.121 0 00.05.064.207.207 0 00.117.033h1.31c.085 0 .18-.042.258-.152a.448.448 0 00.075-.366A16.74 16.74 0 016 9.75a.75.75 0 011.5 0c0 1.588.25 2.926.494 3.85.293 1.113-.504 2.4-1.783 2.4H4.9c-.686 0-1.35-.41-1.589-1.12A16.42 16.42 0 012.5 9.75.75.75 0 013.25 9z"></path><path d="M0 6a4 4 0 014-4h2.75a.75.75 0 01.75.75v6.5a.75.75 0 01-.75.75H4a4 4 0 01-4-4zm4-2.5a2.5 2.5 0 000 5h2v-5H4z"></path><path d="M15.59.082A.75.75 0 0116 .75v10.5a.75.75 0 01-1.189.608l-.002-.001h.001l-.014-.01a5.829 5.829 0 00-.422-.25 10.58 10.58 0 00-1.469-.64C11.576 10.484 9.536 10 6.75 10a.75.75 0 110-1.5c2.964 0 5.174.516 6.658 1.043.423.151.787.302 1.092.443V2.014c-.305.14-.669.292-1.092.443C11.924 2.984 9.713 3.5 6.75 3.5a.75.75 0 110-1.5c2.786 0 4.826-.484 6.155-.957.665-.236 1.154-.47 1.47-.64a5.82 5.82 0 00.421-.25l.014-.01a.75.75 0 01.78-.061zm-.78.06zm.44 11.108l-.44.607.44-.607z"></path></g>
            </svg>
            The system will close on {{ \Carbon\Carbon::create(config('ipms.deadline'))->subSecond()->toDayDateTimeString() }}.
        </div>
    @else
        <div class="flash flash-error flash-full border-top-0 text-center text-bold py-2">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-megaphone mr-1 color-text-tertiary">
                <g fill-rule="evenodd"><path d="M3.25 9a.75.75 0 01.75.75c0 2.142.456 3.828.733 4.653a.121.121 0 00.05.064.207.207 0 00.117.033h1.31c.085 0 .18-.042.258-.152a.448.448 0 00.075-.366A16.74 16.74 0 016 9.75a.75.75 0 011.5 0c0 1.588.25 2.926.494 3.85.293 1.113-.504 2.4-1.783 2.4H4.9c-.686 0-1.35-.41-1.589-1.12A16.42 16.42 0 012.5 9.75.75.75 0 013.25 9z"></path><path d="M0 6a4 4 0 014-4h2.75a.75.75 0 01.75.75v6.5a.75.75 0 01-.75.75H4a4 4 0 01-4-4zm4-2.5a2.5 2.5 0 000 5h2v-5H4z"></path><path d="M15.59.082A.75.75 0 0116 .75v10.5a.75.75 0 01-1.189.608l-.002-.001h.001l-.014-.01a5.829 5.829 0 00-.422-.25 10.58 10.58 0 00-1.469-.64C11.576 10.484 9.536 10 6.75 10a.75.75 0 110-1.5c2.964 0 5.174.516 6.658 1.043.423.151.787.302 1.092.443V2.014c-.305.14-.669.292-1.092.443C11.924 2.984 9.713 3.5 6.75 3.5a.75.75 0 110-1.5c2.786 0 4.826-.484 6.155-.957.665-.236 1.154-.47 1.47-.64a5.82 5.82 0 00.421-.25l.014-.01a.75.75 0 01.78-.061zm-.78.06zm.44 11.108l-.44.607.44-.607z"></path></g>
            </svg>
            The system has closed on {{ \Carbon\Carbon::create(config('ipms.deadline'))->subSecond()->toDayDateTimeString() }}. It is now in read-only mode for encoders. You can no longer create/update PAPs. You may still
            endorse/drop unvalidated PAPs.
        </div>
    @endif

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
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title">Overview</h3>
            <span class="flex-auto"></span>
            <details class="details-reset details-overlay details-overlay-dark">
                <summary class="btn-link">Why am I seeing this?</summary>
                <details-dialog class="Box--overlay">
                    <div class="Box">
                        <div class="Box-header">
                            <button class="Box-btn-octicon btn-octicon float-right" type="button" aria-label="Close dialog" data-close-dialog>
                                <!-- <%= octicon "x" %> -->
                                <svg class="octicon octicon-x" viewBox="0 0 12 16" version="1.1" width="12" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48L7.48 8z"></path></svg>
                            </button>

                            <h3 class="Box-title">
                                Why am I seeing this?
                            </h3>
                        </div>
                        <div class="Box-body">
                            <p>Different users see different types of PAPs as they are affected by the following: </p>

                            <ol class="ml-4">
                                <li><strong>Role:</strong> {{ strtoupper(auth()->user()->role->name) }} {{ auth()->user()->role->description }};</li>
                                <li><strong>Office:</strong> You are seeing PAPs of {{ auth()->user()->office->acronym }} because you
                                belong to the same office. You see other PAPs that were tagged with {{ auth()->user()->office->acronym }}; and </li>
                                <li><strong>Owner:</strong> You see PAPs created by you.</li>
                            </ol>

                            <p class="mt-3">
                                <em>
                                    Note: Admin users can view all PAPs and this supercedes other permissions.
                                </em>
                            </p>
                        </div>

                        <div class="Box-footer">
                            <button type="button" class="btn width-full" data-close-dialog>OK, I get it</button>
                        </div>
                    </div>
                </details-dialog>
            </details>
        </div>

        <ul>
            <li class="Box-row p-0 d-flex flex-wrap">
                <div class="col-12 col-md-4 px-3 py-4">
                    <div class="text-center mb-2 note">PIPS Submission Status</div>
                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ join(', ', $bySubmissionStatus->map(function($ss) {
                        return $ss->projects_count . ' ' . strtolower($ss->name);
                    })->toArray()) }}">
                        <span class="Progress">
                            @foreach($bySubmissionStatus as $status)
                                <span class="Progress-item color-bg-{{ strtolower($status->name) }}-emphasis"
                                      style="width: {{ $projectCount == 0 ? 0: round($status->projects_count / $projectCount * 100) }}%" aria-label="View all {{ strtolower($status->name) }}"> projects</span>
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">{{ $projectCount }}</span>
                        PAPs
                    </div>
                </div>

                <div class="col-12 col-md-4 px-3 py-4 border-right">
                    <div class="text-center mb-2 note">PIPS Validation Status</div>

                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ $validatedCount . ' of ' . $projectCount }} validated">
                        <div class="Progress">
                            <span class="Progress-item color-bg-success-emphasis"
                                  style="width: {{ $projectCount == 0 ? 0 : round($validatedCount / $projectCount) }}%"></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">
                            {{ $projectCount }} PAPs</span>

                    </div>
                </div>

                <div class="col-12 col-md-4 px-3 py-4">
                    <div class="text-center mb-2 note">PIPOL Status</div>

                    <div class="tooltipped tooltipped-n" aria-label="paps: {{ join(', ', $byPipolStatus->pluck('label')->toArray()) }}">
                        <span class="Progress">
                            @foreach($byPipolStatus as $status)
                                <span class="Progress-item color-bg-{{ strtolower($status->name) }}-emphasis"
                                      style="width: {{ $projectCount ? round($status->projects_count / $projectCount * 100) : 0 }}%" aria-label="View all {{ strtolower($status->name) }}"> projects</span>
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="text-emphasized">
                            {{ $projectCount }}</span>
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
                                {{ $validatedCount }}
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