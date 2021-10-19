@extends('layouts.app')

@section('page-header')
    <x-page-header header="Projects"></x-page-header>
@endsection

@section('content')
    <div class="d-flex flex-items-center width-full flex-wrap mb-2 mb-sm-4">
        <form class="subnav-search ml-0 mt-3 mt-lg-0 width-full width-lg-auto flex-auto flex-order-1 flex-lg-order-none js-active-navigation-container" role="search" aria-label="PAPs" action="{{ route('projects.index') }}" accept-charset="UTF-8" method="get">
            <input type="text" name="q" id="q" value="{{ old('q', request()->get('q')) }}" class="form-control subnav-search-input input-contrast width-full" placeholder="Search all PAPs" autocomplete="off" aria-label="Search all PAPs" aria-expanded="true">

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

    <div class="Box">
        <div class="Box-header">
            <h1 class="Box-title">Projects</h1>
        </div>
        <ul>
            @foreach($projects as $project)
            <li class="Box-row d-flex flex-items-center">
                <div class="flex-auto">
                    <strong>{{ $project->title }}</strong>
                    <div class="text-small color-fg-subtle">
                        <div class="Truncate" >
                            <span class="Truncate-text" style="max-width: 480px;">
                                {{ strip_tags($project->description->description) }}
                            </span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View</a>
            </li>
            @endforeach
        </ul>
    </div>

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
