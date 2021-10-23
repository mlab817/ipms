@extends('layouts.app')

@include('offices.offices-header', ['activeTab' => 'users'])

@section('content')
    @forelse($office->users as $user)
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
                    @admin
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
                    @endadmin
                </details-menu>
            </details>

            <div class="d-flex">
                <div class="d-inline-block col-1">
                    <img class="avatar avatar-user" alt="{{ '@' . $user->username }}" src="{{ $user->avatar }}" width="48" height="48" />
                </div>

                <div class="inline-block col-4">
                    <p class="color-fg-muted">{{ $user->full_name }}</p>
                    <h4 class="mb-1">
                        <a href="{{ route('users.show', $user) }}" class="Link--primary mr-1">{{ '@' . $user->username }}</a>
                    </h4>
                    <p class="f5">{{ $user->email }}</p>
                </div>

                <div class="col-4 float-left markdown-body">

                    <p class="f5">
                        <svg class="octicon octicon-organization" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path></svg> Office:
                        <a @if($user->office) href="{{ route('offices.show', $user->office) }}" @else href="#" @endif class="btn-link">
                            {{ optional($user->office)->name }}
                        </a>
                    </p>

                    <p class="f5">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                            <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                        </svg> PAPs:
                        @foreach($user->projects->take(5) as $project)
                            <a href="{{ route('projects.show', $project) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $project->title }}">{{ $project->uuid }}</a>
                        @endforeach
                    </p>

                    @if($user->isIpd())
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
    @empty
        <div class="blankslate blankslate-large">
            <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
            <h3 class="mb-1">There are no users yet for this Office.</h3>
            @can('add', \App\Models\User::class)
                <p>Add a user to this office now by clicking the button below.</p>
                <a class="btn btn-primary my-3" href="{{ route('users.create') }}" role="button">New</a>
            @endcan
        </div>
    @endforelse
@endsection