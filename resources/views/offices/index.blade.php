@extends('layouts.app')

@section('page-header')
    <x-page-header header="Offices"></x-page-header>
@endsection

@section('content')
    <div class="d-flex mb-3">
        <div class="flex-auto">
            <form class="subnav-search ml-0 mt-3 mt-lg-0 width-full width-lg-auto flex-auto flex-order-1 flex-lg-order-none js-active-navigation-container" action="{{ route('offices.index') }}" method="get">
                <input value="{{ request()->query('q') }}" type="search" name="q" class="form-control subnav-search-input input-contrast width-full" placeholder="Find an office..." aria-label="Find a user">

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

        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary class="btn ml-2" aria-haspopup="true">
                Type
                <span class="dropdown-caret"></span>
            </summary>
            <div class="SelectMenu right-0">
                <div class="SelectMenu-modal">
                    <header class="SelectMenu-header">
                        <h3 class="SelectMenu-title">Select role</h3>
                        <button class="SelectMenu-closeButton" type="button" data-close-dialog>
                            <!-- <%= octicon "x" %> -->
                            <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path></svg>
                        </button>
                    </header>
                    <div class="SelectMenu-list">
                        <a class="SelectMenu-item" href="{{ route('offices.index') }}" @if(request()->query('ou_type') == '') aria-checked="true" @endif>
                            <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                            All
                        </a>
                        @foreach($ou_types as $ou_type)
                            <a class="SelectMenu-item" href="{{ route('offices.index', ['ou_type' => $ou_type->name ]) }}" @if(request()->query('ou_type') == $ou_type->name) aria-checked="true" @endif>
                                <!-- <%= octicon "check", class: "SelectMenu-icon SelectMenu-icon--check" %> -->
                                <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                                {{ $ou_type->name }}
                                <span class="Counter ml-1">{{ $ou_type->offices_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </details>
        @can('create', \App\Models\Office::class)
        <a href="{{ route('offices.create') }}" class="btn btn-primary ml-2">New</a>
        @endcan
    </div>

    <div class="Box">
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title overflow-hidden flex-auto">Offices
                <span class="Counter Counter--gray-dark">{{ $offices->total() }}</span>
            </h3>
        </div>
        @if(count($offices))
        <div class="Box-body p-0">
            @foreach($offices as $office)
                <div class="Box-row clearfix position-relative pr-6">
                    <details class="details-reset details-overlay dropdown position-static">
                        <summary class="color-fg-muted position-absolute right-0 top-0 mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-6 mr-1 top-0" role="menu">
                            <a href="{{ route('offices.show', $office) }}" class="btn-link dropdown-item" role="menuitem">
                                View
                            </a>
                            @can('update', $office)
                            <a href="{{ route('offices.edit', $office) }}" class="btn-link dropdown-item" role="menuitem">
                                Edit
                            </a>
                            @endcan
                            @can('delete', $office)
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('offices.destroy', $office) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this office?')" type="submit" class="btn-link dropdown-item" role="menuitem">
                                    Delete
                                </button>
                            </form>
                            @endcan
                        </details-menu>
                    </details>

                    <div class="col-12 col-md-6 col-lg-4 pr-2 float-left">
                        <h4 class="mb-1">
                            <a href="{{ route('offices.show', $office) }}" class="Link mr-1">{{ $office->acronym }}</a>
                        </h4>
                        <p class="color-fg-muted">{{ $office->name }}</p>
                        <p class="f5">{{ $office->office_head_name }}</p>
                        <p class="f5">{{ $office->office_head_position }}</p>
                        <p class="f5">{{ $office->email }}</p>
                        <p class="f6">{{ $office->contact_numbers }}</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8 float-left markdown-body">
                        <p class="f5">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg> PAPs:
                            @foreach($office->projects->take(5) as $project)
                                <a href="{{ route('projects.show', $project) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $project->title }}">{{ $project->uuid }}</a>
                            @endforeach
                        </p>
                        <p class="f5">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-person">
                                <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                            </svg> Users:
                            @foreach($office->users as $user)
                                <a href="{{ route('users.show', $user) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $user->full_name }}">
                                    {{ $user->username }}
                                </a>
                            @endforeach
                        </p>
                        <p class="f5">
                            <svg class="octicon octicon-tasklist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg> Reviewers:
                            @foreach($office->reviewers as $user)
                                <a href="{{ route('users.show', $user) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $user->full_name }}">
                                    {{ $user->username }}
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="Box-footer">
            <div class="pagination text-center">
                {{ $offices->links() }}
            </div>
        </div>
        @else
            <x-blankslate title="Nothing to show"></x-blankslate>
        @endif
    </div>
@endsection