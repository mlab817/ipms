@extends('layouts.app')

@section('page-header')
    <header class="color-bg-subtle border-bottom-0 pt-0">

        <div class="container-lg pt-4 p-responsive clearfix">

            <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">

                <div class="flex-1">
                    <h1 class="h1 lh-condensed">
                        Programs and Projects
                    </h1>

                    <div class="color-fg-muted"><div></div></div>

                    <div class="d-md-flex flex-items-center mt-2">

                    </div>
                </div>

                <div class="flex-self-start mt-3">

                </div>

            </div>
        </div>

        <div class="position-relative mt-3">
            <nav class="UnderlineNav hx_UnderlineNav overflow-visible" aria-label="Tag">
                <div class="width-full d-flex position-relative container-lg">
                    <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">
                        <li data-tab-item="org-header-projects-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('projects.index', ['tab' => 'trip']) }}" data-hotkey="g b" @if($tab == 'trip') aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                                TRIP
                                <span title="Not available" class="Counter js-profile-project-count">
                                    {{ \App\Models\Project::byRole()->trip()->count() }}
                                </span>
                            </a>
                        </li>

                        <li data-tab-item="org-header-people-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('projects.index', ['tab' => 'pip']) }}" @if($tab == 'pip') aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-person UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                                </svg>
                                PIP
                                <span title="Not available" class="Counter">
                                    {{ \App\Models\Project::byRole()->trip()->count() }}
                                </span>
                            </a>
                        </li>

                        <li data-tab-item="org-header-people-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('projects.index', ['tab' => 'untagged']) }}" @if($tab == 'untagged') aria-current="page" @endif>
                                <svg class="octicon octicon-x-circle-fill UnderlineNav-octicon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.343 13.657A8 8 0 1113.657 2.343 8 8 0 012.343 13.657zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg>
                                Untagged
                                <span title="Not available" class="Counter">
                                    {{ \App\Models\Project::byRole()->untagged()->count() }}
                                </span>
                            </a>
                        </li>

                    </ul>

                </div>
            </nav>
        </div>

    </header>
@endsection

@section('content')
    @if(auth()->user()->isEncoder())
        <div class="d-flex flex-justify-end mb-5 position-relative">
            <details class="details-reset details-overlay">
                <summary class="btn btn-primary" aria-haspopup="true">
                    <svg class="octicon octicon-download" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M7.47 10.78a.75.75 0 001.06 0l3.75-3.75a.75.75 0 00-1.06-1.06L8.75 8.44V1.75a.75.75 0 00-1.5 0v6.69L4.78 5.97a.75.75 0 00-1.06 1.06l3.75 3.75zM3.75 13a.75.75 0 000 1.5h8.5a.75.75 0 000-1.5h-8.5z"></path></svg>
                    Download
                </summary>
                <div class="SelectMenu right-0">
                    <div class="SelectMenu-modal">
                        <div class="SelectMenu-list SelectMenu-list--borderless">
                            <a href="{{ route('download') }}" target="_blank" class="SelectMenu-item" role="menuitem">Download Endorsement Letter</a>
                            <a href="{{ route('export') }}" class="SelectMenu-item" role="menuitem">Export PAPs to Excel</a>
                        </div>
                    </div>
                </div>
            </details>
        </div>
    @endif

    <div class="d-flex flex-row flex-items-center mt-5">
        <div class="d-flex mr-md-0 mr-lg-3 flex-auto">
            <form class="subnav-search ml-0 mt-lg-0 width-full width-lg-auto flex-auto flex-order-1 flex-lg-order-none js-active-navigation-container" role="search" aria-label="PAPs" action="{{ route('projects.index') }}" accept-charset="UTF-8" method="get">
                @if(request()->has('pipol'))
                <input type="hidden" name="pipol" value="{{ request()->query('pipol') ?? null }}">
                @endif
                @if(request()->has('status'))
                <input type="hidden" name="status" value="{{ request()->query('status') ?? null }}">
                @endif
                @if(request()->has('validated'))
                <input type="hidden" name="validated" value="{{ request()->query('validated') ?? null }}">
                @endif
                @if(request()->has('tab'))
                    <input type="hidden" name="tab" value="{{ request()->query('tab') ?? 'trip' }}">
                @endif
                <input type="search" id="q" name="q" class="form-control subnav-search-input input-contrast width-full" placeholder="Find a PAP…" autocomplete="off" aria-label="Find a PAP…" value="{{ old('q', request()->get('q')) }}">

                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-search subnav-search-icon">
                    <path fill-rule="evenodd" d="M11.5 7a4.499 4.499 0 11-8.998 0A4.499 4.499 0 0111.5 7zm-.82 4.74a6 6 0 111.06-1.06l3.04 3.04a.75.75 0 11-1.06 1.06l-3.04-3.04z"></path>
                </svg>

                <button type="button" class="position-absolute top-0 right-0 mt-1 mr-1 btn-octicon issues-reset-query js-discussion-search-clear" aria-label="Clear filters" hidden="">
                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-x issues-reset-query-icon">
                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                    </svg>
                </button>
            </form>

        </div>

        <div class="d-flex">

            <details class="details-reset details-overlay position-relative mt-lg-0 ml-1" id="sort-options">
                <summary aria-haspopup="menu" role="button" class="btn">
                    <span>{{ request()->query('status') ?? 'All' }}</span>
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="SelectMenu right-lg-0" role="menu">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <span class="SelectMenu-title">Select PIPS status</span>
                        </header>
                        <div class="SelectMenu-list">
                            <a class="SelectMenu-item" href="{{ route('projects.index', ['status' => null ]) }}" role="menuitemradio" @if(! request()->query('status')) aria-checked="true" @endif tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal" data-menu-button-text="">All ({{ $projects->total() }})</span>
                            </a>
                            @foreach($submission_statuses as $status)
                            <a class="SelectMenu-item" href="{{ route('projects.index', ['status' => $status->name ]) }}" role="menuitemradio" @if(request()->query('status') == $status->name) aria-checked="true" @endif" tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal">{{ $status->name }} ({{ $status->projects_count }})</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </details-menu>
            </details>

            <details class="details-reset details-overlay position-relative mt-lg-0 ml-1" id="sort-validated">
                <summary aria-haspopup="menu" role="button" class="btn">
                    <span>{{ ! request()->has('validated') ? 'All' : (request()->query('validated' == 1) ? 'Validated' : 'Not Validated') }}</span>
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="SelectMenu right-lg-0" role="menu">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <span class="SelectMenu-title">Select validation status</span>
                        </header>
                        <div class="SelectMenu-list">
                            <a class="SelectMenu-item" href="{{ route('projects.index', ['validated' => null ]) }}" role="menuitemradio" @if(! request()->has('validated')) aria-checked="true" @endif tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal" data-menu-button-text="">All ({{ $projects->total() }})</span>
                            </a>

                            <a class="SelectMenu-item" href="{{ route('projects.index', ['validated' => 1 ]) }}" role="menuitemradio" @if(request()->query('validated') == 1) aria-checked="true" @endif" tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal">Validated ({{ $validatedProjects }})</span>
                            </a>

                            <a class="SelectMenu-item" href="{{ route('projects.index', ['validated' => 0 ]) }}" role="menuitemradio" @if(request()->has('validated') && request()->query('validated') == 0) aria-checked="true" @endif" tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal">Not Validated ({{ $invalidatedProjects }})</span>
                            </a>
                        </div>
                    </div>
                </details-menu>
            </details>

            <details class="details-reset details-overlay position-relative mt-lg-0 ml-1" id="sort-validated">
                <summary aria-haspopup="menu" role="button" class="btn">
                    <span>{{ ! request()->has('pipol') ? 'All' : request()->query('pipol') }}</span>
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="SelectMenu right-lg-0" role="menu">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <span class="SelectMenu-title">Select PIPOL status</span>
                        </header>
                        <div class="SelectMenu-list">
                            <a class="SelectMenu-item" href="{{ route('projects.index', ['pipol' => null ]) }}" role="menuitemradio" @if(! request()->has('pipol')) aria-checked="true" @endif tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal" data-menu-button-text="">All ({{ $projects->total() }})</span>
                            </a>

                            @foreach($pipol_statuses as $pipol)
                                <a class="SelectMenu-item" href="{{ route('projects.index', ['pipol' => $pipol->name ]) }}" role="menuitemradio" @if(request()->query('pipol') == $pipol->name) aria-checked="true" @endif" tabindex="0">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                    </svg>
                                    <span class="text-normal">{{ $pipol->name }} ({{ $pipol->projects_count }})</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </details-menu>
            </details>

        </div>
        @can('create', \App\Models\Project::class)
        <div class="d-none d-md-flex flex-md-items-center flex-md-justify-end">
            <a href="{{ route('projects.create') }}" class="text-center btn btn-primary ml-3">
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                </svg>
                New
            </a>
        </div>
        @endif
    </div>

    @if(request()->has('q'))
        <div class="d-flex my-3 p-2">
            Showing page {{ $projects->currentPage() }} of {{ $projects->lastPage() }} of results for<strong>&nbsp;{{ request()->query('q') }}</strong>
        </div>
    @endif

    <ul class="border-top mt-3 border-bottom">
        @forelse($projects as $project)

        <li class="d-flex Box-row px-2 @if(! $project->seen) Box-row--gray @endif width-full py-3 clearfix position-relative color-border-muted">
            <div class="flex-shrink-0 pt-2">
                @if($project->isDraft())
                <span class="tooltipped tooltipped-n" aria-label="Draft by encoder">
                    <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                </span>
                @endif

                @if($project->isEndorsed())
                    <span class="tooltipped tooltipped-n" aria-label="Endorsed by encoder">
                        <svg class="octicon octicon-issue-closed closed" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                    </span>
                @endif

                @if($project->isDropped())
                    <span class="tooltipped tooltipped-n" aria-label="Dropped by encoder">
                        <svg class="octicon octicon-x-circle open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M3.404 12.596a6.5 6.5 0 119.192-9.192 6.5 6.5 0 01-9.192 9.192zM2.344 2.343a8 8 0 1011.313 11.314A8 8 0 002.343 2.343zM6.03 4.97a.75.75 0 00-1.06 1.06L6.94 8 4.97 9.97a.75.75 0 101.06 1.06L8 9.06l1.97 1.97a.75.75 0 101.06-1.06L9.06 8l1.97-1.97a.75.75 0 10-1.06-1.06L8 6.94 6.03 4.97z"></path></svg>
                    </span>
                @endif

                @if(! $project->isValidated())
                <span class="tooltipped tooltipped-n" aria-label="Not yet validated by IPD">
                    <svg class="octicon octicon-issue-opened" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path></svg>
                </span>
                @endif

                @if($project->isValidated())
                <span class="tooltipped tooltipped-n" aria-label="Validated by IPD">
                    <svg class="octicon octicon-issue-closed closed" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path d="M11.28 6.78a.75.75 0 00-1.06-1.06L7.25 8.69 5.78 7.22a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l3.5-3.5z"></path><path fill-rule="evenodd" d="M16 8A8 8 0 110 8a8 8 0 0116 0zm-1.5 0a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"></path></svg>
                </span>
                @endif
            </div>

            <div class="d-inline col-9 ml-3 mr-3 flex-auto">
                <div class="d-inline-block mb-1">
                    <div class="d-inline wb-break-all">
                        <a href="{{ route('projects.show', $project) }}" class="Link--onHover">
                            <strong>{{ $project->title }}</strong>
                        </a>
                    </div>
                    <div class="d-inline">
                        @if($project->trip)
                        <span class="Label">TRIP</span>
                        @endif
                    </div>
                    <div class="text-small color-fg-subtle">
                        <div class="Truncate" >
                            <span class="Truncate-text" style="max-width: 480px;">
                                {{ strip_tags($project->description->description) }}
                            </span>
                        </div>
                    </div>
                </div>

                <div>
                </div>

                <div class="f6 color-fg-muted mt-2">

                    <span class="ml-0 mr-3">
                        <span class="repo-language-color" style="background-color: @if($project->pap_type->name == 'Project') #e34c26 @else #2da44e @endif"></span>
                        <span itemprop="">
                            {{ $project->project_status->name }}
                            {{ optional($project->pap_type)->name }}
                        </span>
                    </span>

                    <a href="{{  route('offices.show', $project->office) }}" class="btn-link">
                        <span class="ml-0 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="10" height="10"><path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path></svg>

                            <span itemprop="">
                                {{ optional($project->office)->acronym }}
                            </span>
                        </span>
                    </a>

                    <span class="ml-0 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="10" height="10"><path fill-rule="evenodd" d="M5.604.089A.75.75 0 016 .75v4.77h.711a.75.75 0 110 1.5H3.759a.75.75 0 110-1.5H4.5V2.15l-.334.223a.75.75 0 01-.832-1.248l1.5-1a.75.75 0 01.77-.037zM9 4.75A.75.75 0 019.75 4h4a.75.75 0 01.53 1.28l-1.89 1.892c.312.076.604.18.867.319.742.391 1.244 1.063 1.244 2.005 0 .653-.231 1.208-.629 1.627-.386.408-.894.653-1.408.777-1.01.243-2.225.063-3.124-.527a.75.75 0 01.822-1.254c.534.35 1.32.474 1.951.322.306-.073.53-.201.67-.349.129-.136.218-.32.218-.596 0-.308-.123-.509-.444-.678-.373-.197-.98-.318-1.806-.318a.75.75 0 01-.53-1.28l1.72-1.72H9.75A.75.75 0 019 4.75zm-3.587 5.763c-.35-.05-.77.113-.983.572a.75.75 0 11-1.36-.632c.508-1.094 1.589-1.565 2.558-1.425 1 .145 1.872.945 1.872 2.222 0 1.433-1.088 2.192-1.79 2.681-.308.216-.571.397-.772.573H7a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75c0-.69.3-1.211.67-1.61.348-.372.8-.676 1.15-.92.8-.56 1.18-.904 1.18-1.474 0-.473-.267-.69-.587-.737z"></path></svg>
                        PhP {{ format_money($project->total_project_cost) }}
                    </span>


                    by <a href="{{ route('users.show', $project->creator) }}" class="btn-link">
                        <span class="ml-0 mr-3">
                            <span itemprop="">
                                {{ optional($project->creator)->full_name }}
                            </span>
                        </span>
                    </a>

                    <svg class="octicon octicon-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path></svg>

                    Updated {{ $project->updated_at->diffForHumans(null, null, true) }}
                </div>
            </div>

            <div class="text-right mr-5">
                <span class="Label">{{ optional($project->pipol_status)->name }}</span>
            </div>

            <div class="">
                <details class="details-reset details-overlay dropdown position-static">
                    <summary class="color-fg-muted position-absolute right-0 top-0 mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                            <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                        </svg>
                    </summary>
                    <details-menu class="dropdown-menu dropdown-menu-sw mt-6 mr-1 top-0" role="menu">
                        <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                            View
                        </a>
                        @can('update', $project)
                        <a href="{{ route('projects.edit', $project) }}" class="btn-link dropdown-item" role="menuitem">
                            Edit
                        </a>
                        @endcan
                        @can('transfer', $project)
                            <div role="none" class="dropdown-divider"></div>
                            <details class="details-reset details-overlay details-overlay-dark position-relative">
                                <summary class="dropdown-item" aria-haspopup="dialog">
                                    Transfer
                                </summary>
                                <details-dialog class="Box--overlay anim-fade-in fast">
                                    <form action="{{ route('projects.transfer', $project) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="Box" x-data="{ username: '' }">
                                            <div class="Box-header">
                                                <h3 class="Box-title">Transfer PAP</h3>
                                            </div>
                                            <div class="flash flash-warn flash-full">
                                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-alert">
                                                    <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
                                                </svg>
                                                <strong class="overflow-hidden">Unexpected bad things will happen if you don’t read this!</strong>
                                            </div>
                                            <div class="Box-body">
                                                <div class="d-flex flex-nowrap">
                                                    <div>
                                                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-checklist">
                                                            <path fill-rule="evenodd" d="M2.5 1.75a.25.25 0 01.25-.25h8.5a.25.25 0 01.25.25v7.736a.75.75 0 101.5 0V1.75A1.75 1.75 0 0011.25 0h-8.5A1.75 1.75 0 001 1.75v11.5c0 .966.784 1.75 1.75 1.75h3.17a.75.75 0 000-1.5H2.75a.25.25 0 01-.25-.25V1.75zM4.75 4a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5zM4 7.75A.75.75 0 014.75 7h2a.75.75 0 010 1.5h-2A.75.75 0 014 7.75zm11.774 3.537a.75.75 0 00-1.048-1.074L10.7 14.145 9.281 12.72a.75.75 0 00-1.062 1.058l1.943 1.95a.75.75 0 001.055.008l4.557-4.45z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="pl-3 flex-1">
                                                        <p class="overflow-hidden mb-1">Before you transfer PAP, please note:</p>
                                                        <ul class="ml-3">
                                                            <li>
                                                                Transferred PAPs will change its owner/creator as well as the office it
                                                                was originally tagged into unless the receiving user belongs to the same
                                                                office.
                                                            </li>
                                                            <li>
                                                                There is no confirmation on the transfer. This process will immediately
                                                                transfer the PAP to the receiving user.
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <p class="mt-3">
                                                    Select user to transfer the PAP ownership into.
                                                </p>
                                                <auto-complete src="{{ route('search.encoders') }}" for="encoders-popup-{{ $project->id }}">
                                                    <input x-model="username" autofocus required placeholder="Type to search users..." name="username" type="text" class="form-control width-full" >
                                                    <ul id="encoders-popup-{{ $project->id }}"></ul>
                                                </auto-complete>
                                            </div>
                                            <div class="Box-footer">
                                                <button x-bind:disabled="!username" type="submit" class="btn btn-primary width-full">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </details-dialog>
                            </details>
                        @endcan
                        @can('delete', $project)
                        <div role="none" class="dropdown-divider"></div>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete this PAP?')" type="submit" href="{{ route('projects.destroy', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                Delete
                            </button>
                        </form>
                        @endcan
                    </details-menu>
                </details>
            </div>
        </li>
        @empty
        <div class="blankslate blankslate-large">
            <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
            <h3 class="mb-1">There are no programs or projects to show.</h3>
            <p>Change your filters and search or add a new PAP to continue.</p>
            <a class="btn btn-primary my-3" href="{{ route('projects.create') }}" role="button">New</a>
        </div>
        @endforelse
    </ul>

    <div class="paginate-container d-none d-sm-flex flex-sm-justify-center py-3">
        {{ $projects->appends(request()->except('page'))->links() }}
    </div>

    @if(auth()->user()->role)
    <div class="protip mb-3">
        <div class="col-xl-6 col-lg-9 col-md-12 mx-auto">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-light-bulb color-text-secondary">
                <path fill-rule="evenodd" d="M8 1.5c-2.363 0-4 1.69-4 3.75 0 .984.424 1.625.984 2.304l.214.253c.223.264.47.556.673.848.284.411.537.896.621 1.49a.75.75 0 01-1.484.211c-.04-.282-.163-.547-.37-.847a8.695 8.695 0 00-.542-.68c-.084-.1-.173-.205-.268-.32C3.201 7.75 2.5 6.766 2.5 5.25 2.5 2.31 4.863 0 8 0s5.5 2.31 5.5 5.25c0 1.516-.701 2.5-1.328 3.259-.095.115-.184.22-.268.319-.207.245-.383.453-.541.681-.208.3-.33.565-.37.847a.75.75 0 01-1.485-.212c.084-.593.337-1.078.621-1.489.203-.292.45-.584.673-.848.075-.088.147-.173.213-.253.561-.679.985-1.32.985-2.304 0-2.06-1.637-3.75-4-3.75zM6 15.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zM5.75 12a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5z"></path>
            </svg>
            <strong>ProTip!</strong>
            {{ strtoupper(auth()->user()->role->name) . ': ' . \App\Models\Role::ROLE_DESCRIPTIONS[auth()->user()->role->name] }}
        </div>
    </div>
    @endif
@endsection
