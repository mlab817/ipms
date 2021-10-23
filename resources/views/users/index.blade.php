@extends('layouts.app')

@section('page-header')
    <x-page-header header="Users"></x-page-header>
@endsection

@section('content')
    <div class="d-flex mb-3">
        <div class="flex-auto">
            <form action="{{ route('users.index') }}" method="get">
                <input value="{{ request()->query('q') }}" type="search" name="q" class="form-control width-full" placeholder="Find a user..." aria-label="Find a user">
            </form>
        </div>

        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary class="btn ml-2" aria-haspopup="true">
                Office
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
                        <a class="SelectMenu-item" href="{{ route('users.index') }}" @if(request()->query('office') == '') aria-checked="true" @endif>
                            <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                            All
                        </a>
                        @foreach($offices as $office)
                            <a class="SelectMenu-item" href="{{ route('users.index', ['office' => $office->acronym ]) }}" @if(request()->query('office') == $office->acronym) aria-checked="true" @endif>
                                <!-- <%= octicon "check", class: "SelectMenu-icon SelectMenu-icon--check" %> -->
                                <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                                {{ $office->acronym }}
                                <span class="Counter ml-1">{{ $office->users_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </details>

        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary class="btn ml-2" aria-haspopup="true">
                Role
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
                        <a class="SelectMenu-item" href="{{ route('users.index') }}" @if(request()->query('role') == '') aria-checked="true" @endif>
                            <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                            All
                        </a>
                        @foreach($roles as $role)
                            <a class="SelectMenu-item" href="{{ route('users.index', ['role' => $role->name ]) }}" @if(request()->query('role') == $role->name) aria-checked="true" @endif>
                                <!-- <%= octicon "check", class: "SelectMenu-icon SelectMenu-icon--check" %> -->
                                <svg class="SelectMenu-icon SelectMenu-icon--check octicon octicon-check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M13.78 4.22C13.9204 4.36062 13.9993 4.55125 13.9993 4.75C13.9993 4.94875 13.9204 5.13937 13.78 5.28L6.53 12.53C6.38937 12.6704 6.19875 12.7493 6 12.7493C5.80125 12.7493 5.61062 12.6704 5.47 12.53L2.22 9.28C2.08752 9.13782 2.0154 8.94978 2.01882 8.75547C2.02225 8.56117 2.10096 8.37579 2.23838 8.23837C2.37579 8.10096 2.56118 8.02225 2.75548 8.01882C2.94978 8.01539 3.13782 8.08752 3.28 8.22L6 10.94L12.72 4.22C12.8606 4.07955 13.0512 4.00066 13.25 4.00066C13.4487 4.00066 13.6394 4.07955 13.78 4.22Z"></path></svg>
                                {{ $role->name }}
                                <span class="Counter ml-1">{{ $role->users_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </details>
        @can('create', \App\Models\User::class)
        <a href="{{ route('users.create') }}" class="btn btn-primary ml-2">New</a>
        @endcan
    </div>

    <div class="Box">
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title overflow-hidden flex-auto">Users
                <span class="Counter Counter--gray-dark">{{ \App\Models\User::count() }}</span>
            </h3>
        </div>
        @if(count($users))
        <div class="Box-body p-0">
            @foreach($users as $user)
                <div class="Box-row clearfix position-relative pr-6">
                    <details class="details-reset details-overlay dropdown position-static">
                        <summary class="color-fg-muted position-absolute right-0 top-0 mt-3 px-3" aria-label="User menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-6 mr-1 top-0" role="menu">
                            <a href="{{ route('users.show', $user) }}" class="btn-link dropdown-item" role="menuitem">
                                View
                            </a>
                            <a href="{{ route('users.edit', $user) }}" class="btn-link dropdown-item" role="menuitem">
                                Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button onclick="return confirm('Are you sure you want to delete this office?')" type="submit" class="btn-link dropdown-item" role="menuitem">
                                    Delete
                                </button>
                            </form>
                        </details-menu>
                    </details>

                    <div class="d-flex">
                        <div class="d-inline-block col-1">
                            <img class="avatar avatar-user" alt="{{ '@' . $user->username }}" src="{{ $user->avatar }}" width="48" height="48" />
                        </div>

                        <div class="inline-block col-4">
                            <p class="mb-0">
                                <a href="{{ route('users.show', $user) }}" class="btn-link mr-1">{{ $user->full_name }}</a>
                            </p>
                            <p class="f4 mb-1">{{ '@' . $user->username }}</p>
                            <p class="f5">{{ $user->email }}</p>
                            <p><span class="Label">{{ optional($user->role)->name }}</span></p>
                        </div>

                        <div class="col-4 float-left markdown-body">

                            <p class="f5">
                                <svg class="octicon octicon-organization" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path></svg>
                                Office:
                                <a @if($user->office) href="{{ route('offices.show', $user->office) }}" @else href="#" @endif class="btn-link">
                                    {{ optional($user->office)->acronym }}
                                </a>
                            </p>

                            <p class="f5">
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                                </svg> Owned PAPs:
                                @foreach($user->projects->take(5) as $project)
                                    <a href="{{ route('projects.show', $project) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $project->title }}">{{ $project->uuid }}</a>
                                @endforeach
                            </p>

                            @if(auth()->user()->isIpd())
                            <p class="f5">
                                <svg class="octicon octicon-tasklist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg> Reviews:
                                @foreach($user->offices as $office)
                                    <a href="{{ route('offices.show', $office) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $office->name }}">{{ $office->acronym }}</a>
                                @endforeach
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="Box-footer">
            <div class="pagination text-center">
                {{ $users->appends(request()->except('page'))->links() }}
            </div>
        </div>
        @else
            <x-blankslate title="No user found"></x-blankslate>
        @endif
    </div>
@endsection