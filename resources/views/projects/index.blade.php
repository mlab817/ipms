@extends('layouts.app')

@section('page-header')
    <x-page-header header="Projects"></x-page-header>
@endsection

@section('content')
    <div class="d-flex flex-column flex-lg-row flex-auto">
        <div class="mb-1 mb-md-0 mr-md-3 flex-auto">
            <form class="subnav-search ml-0 mt-3 mt-lg-0 width-full width-lg-auto flex-auto flex-order-1 flex-lg-order-none js-active-navigation-container" role="search" aria-label="PAPs" action="{{ route('projects.index') }}" accept-charset="UTF-8" method="get">
                <input type="search" id="q" name="q" class="form-control subnav-search-input input-contrast width-full" placeholder="Find a PAP…" autocomplete="off" aria-label="Find a PAP…" value="{{ old('q', request()->get('q')) }}">
                <input type="hidden" name="status" value="{{ request()->query('status') }}">
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

        <div class="d-flex flex-wrap">
            <details class="details-reset details-overlay position-relative mt-1 mt-lg-0 ml-1" id="sort-options">
                <summary aria-haspopup="menu" role="button" class="btn">
                    <span>{{ request()->query('status') ?? 'All' }}</span>
                    <span class="dropdown-caret"></span>
                </summary>
                <details-menu class="SelectMenu right-lg-0" role="menu">
                    <div class="SelectMenu-modal">
                        <header class="SelectMenu-header">
                            <span class="SelectMenu-title">Select status</span>
                        </header>
                        <div class="SelectMenu-list">
                            <a class="SelectMenu-item" href="{{ route('projects.index', array_merge(request()->except('status'), ['status' => null ])) }}" role="menuitemradio" @if(! request()->query('status')) aria-checked="true" @endif tabindex="0">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-check SelectMenu-icon SelectMenu-icon--check">
                                    <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                                </svg>
                                <span class="text-normal" data-menu-button-text="">All ({{ $totalProjectsCount }})</span>
                            </a>
                            @foreach($submission_statuses as $status)
                            <a class="SelectMenu-item" href="{{ route('projects.index', array_merge(request()->except('status'), ['status' => $status->name ])) }}" role="menuitemradio" @if(request()->query('status') == $status->name) aria-checked="true" @endif" tabindex="0">
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
        </div>

        <div class="d-none d-md-flex flex-md-items-center flex-md-justify-end">
            <a href="{{ route('projects.create') }}" class="text-center btn btn-primary ml-3">
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                </svg>
                New
            </a>
        </div>
    </div>

    <ul class="border-top mt-3">
        @forelse($projects as $project)
        <li class="col-12 d-flex width-full py-4 border-bottom color-border-muted">
            <div class="col-10 col-lg-9 d-inline-block">
                <div class="d-inline-block mb-1">
                    <div class="d-inline wb-break-all">
                        <a href="{{ route('projects.show', $project) }}" class="Link--onHover">
                            <strong>{{ $project->title }}</strong>
                        </a>
                    </div>
                    <div class="d-inline">
                        <a href="{{ route('projects.index', array_merge(request()->except('status'), ['status' => $project->submission_status->name ])) }}" class="btn-link">
                            <span class="Label Label--secondary v-align-middle mr-1 mb-1">
                                {{ $project->submission_status->name }}
                            </span>
                        </a>
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

                    <a href="{{ route('offices.show', $project->office) }}" class="btn-link Link--muted">
                        <span class="ml-0 mr-3">
                            <span class="repo-language-color" style="background-color: #e34c26"></span>
                            <span itemprop="">
                                {{ optional($project->office)->acronym }}
                            </span>
                        </span>
                    </a>

                    Updated {{ $project->updated_at->diffForHumans(null, null, true) }}
                </div>
            </div>

            <div class="col-2 col-lg-3 d-flex flex-column flex-justify-around">
                <div class="text-right">
                    <details class="details-reset details-overlay dropdown">
                        <summary class="color-fg-muted position-relative mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-4 mr-1 top-0" role="menu">
                            <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                View
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                Edit
                            </a>
                            <div role="none" class="dropdown-divider"></div>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this PAP?')" type="submit" href="{{ route('projects.destroy', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                    Delete
                                </button>
                            </form>
                        </details-menu>
                    </details>
                </div>
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

    <div class="paginate-container d-none d-sm-flex flex-sm-justify-center">
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
