<div class="Header">
    <div class="Header-item">
        <a href="{{ route('dashboard') }}" class="Header-link f4 d-flex flex-items-center">
            <!-- <%= octicon "mark-github", class: "mr-2", height: 32 %> -->
            <img class="avatar avatar-user" src="{{ asset('images/pips.png') }}" alt="pips" height="32">
        </a>
    </div>
    <div class="Header-item hide-md hide-sm">
        <form action="{{ route('projects.index') }}" method="get">
            <input type="search" class="form-control Header-input" name="q" />
        </form>
    </div>
    <div class="Header-item Header-item--full">
        <a class="Header-link" href="{{ route('dashboard') }}">
            Dashboard
        </a>
        <a class="Header-link ml-2" href="{{ route('projects.index') }}">
            Your PAPs
        </a>
        <a class="Header-link ml-2" href="{{ route('offices.index') }}">
            Offices
        </a>
        <a class="Header-link ml-2" href="{{ route('users.index') }}">
            Users
        </a>
    </div>

    <div class="Header-item position-relative d-none d-md-flex">
        <details class="details-overlay details-reset">
            <summary class="Header-link" aria-label="Create new…" aria-haspopup="menu" role="button">
                <!-- octicon-add -->
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-plus">
                    <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                </svg>
                <span class="dropdown-caret"></span>
            </summary>
            <details-menu class="dropdown-menu dropdown-menu-sw" role="menu">
                <a role="menuitem" class="dropdown-item" href="{{ route('projects.create') }}">
                    Create a New PAP
                </a>
                @admin
                    <a role="menuitem" class="dropdown-item" href="{{ route('offices.create') }}">
                        New Office
                    </a>
                    <a role="menuitem" class="dropdown-item" href="{{ route('users.create') }}">
                        New User
                    </a>
                @endadmin
            </details-menu>
        </details>
    </div>
    <div class="Header-item mr-0">
        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary class="Header-link" role="button" aria-haspopup="menu">
                <img class="avatar" height="20" alt="{{ '@' . auth()->user()->username }}" src="{{ auth()->user()->avatar }}" width="20">
                <span class="dropdown-caret"></span>
            </summary>
            <ul class="dropdown-menu dropdown-menu-sw mt-2">
                <li>
                    <a role="menuitem" class="no-underline px-3 pt-2 pb-2 mb-n2 mt-n1 d-block" href="javascript:void(0)">
                        Signed in as <strong class="css-truncate-target">{{ optional(auth()->user()->role)->name }}</strong>
                    </a>
                </li>
                <li class="dropdown-divider hide-xl hide-lg"></li>
                <li class="px-2 hide-xl hide-lg">
                    <form action="{{ route('projects.index') }}" method="get">
                        <input type="search" autocomplete="off" class="form-control input-sm width-full" name="q">
                    </form>
                </li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('projects.create') }}">Create a New PAP</a></li>
                <li><a class="dropdown-item" href="{{ route('projects.index') }}">Your PAPs</a></li>
                <li><a href="{{ route('users.show', auth()->user()) }}" class="dropdown-item">Your Profile</a></li>
                <div class="dropdown-divider" role="separator"></div>
                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a href="javascript:void(0)" class="dropdown-item" onclick="confirmLogout()">
                    Logout
                </a>
            </ul>
        </details>
    </div>
</div>