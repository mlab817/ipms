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
    <ol class="d-flex flex-wrap list-style-none gutter-condensed mb-4 js-pinned-items-reorder-list">
        @foreach($bySubmissionStatus as $status)
        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-4 col-lg-3">
            <div class="Box d-flex pinned-item-list-item p-3 width-full js-pinned-item-list-item public sortable-button-item source">
                <div class="pinned-item-list-item-content">
                    <div class="d-flex width-full flex-items-center position-relative">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo mr-2 color-text-secondary flex-shrink-0">
                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                        </svg>
                        <a class="text-bold flex-auto min-width-0 " href="{{ route('projects.index', ['status' => $status->name ]) }}">
                            <span class="repo" title="pips">{{ $status->name }}</span>
                        </a>
                        <span class="Label Label--secondary v-align-middle ml-1">
                            {{ $status->projects_count }}
                        </span>
                    </div>

                </div>
            </div>
        </li>
        @endforeach
        <li class="mb-3 d-flex flex-content-stretch col-12 col-md-4 col-lg-3">
            <div class="Box d-flex pinned-item-list-item p-3 width-full js-pinned-item-list-item public sortable-button-item source">
                <div class="pinned-item-list-item-content">
                    <div class="d-flex width-full flex-items-center position-relative">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo mr-2 color-text-secondary flex-shrink-0">
                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                        </svg>
                        <a class="text-bold flex-auto min-width-0 " href="#">
                            <span class="repo" title="pips">Validated</span>
                        </a>
                        <span class="Label Label--secondary v-align-middle ml-1">
                        {{ $validated }}
                    </span>
                    </div>
                </div>
            </div>
        </li>
    </ol>

    <div>
        <canvas id="myChart"></canvas>
    </div>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = @json(\App\Models\RefFundingSource::all()->pluck('name')->toArray())

        const data = {
            labels: labels,
            datasets: [{
                label: 'No. of Projects by Fund Source',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: @json(\App\Models\RefFundingSource::withCount('projects')->get()->pluck('projects_count')->toArray()),
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

@endpush