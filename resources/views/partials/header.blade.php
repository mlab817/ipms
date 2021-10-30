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
        <div class="Header-item mr-0 mr-md-3 flex-order-1 flex-md-order-none">

            <a href="{{ route('notifications.index') }}" class="Header-link notification-indicator position-relative tooltipped tooltipped-sw" aria-label="You have unread notifications" data-hotkey="g n" data-ga-click="Header, go to notifications, icon:unread" data-target="notification-indicator.link">
                @if(count(auth()->user()->unreadNotifications))
                    <span class="mail-status unread "></span>
                @endif
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-bell">
                    <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path>
                    <path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>
                </svg>
            </a>

        </div>
        
        <details class="details-overlay details-reset">
            <summary class="Header-link" aria-label="Create new…" aria-haspopup="menu" role="button">
                <!-- octicon-add -->
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-plus">
                    <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                </svg>
                <span class="dropdown-caret"></span>
            </summary>
            <details-menu class="dropdown-menu dropdown-menu-sw" role="menu">
                @can('create', \App\Models\Project::class)
                <a role="menuitem" class="dropdown-item" href="{{ route('projects.create') }}">
                    Create a New PAP
                </a>
                @endcan
                @can('create', \App\Models\Office::class)
                    <a role="menuitem" class="dropdown-item" href="{{ route('offices.create') }}">
                        New Office
                    </a>
                @endcan
                @can('create', \App\Models\User::class)
                    <a role="menuitem" class="dropdown-item" href="{{ route('users.create') }}">
                        New User
                    </a>
                @endcan
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
                @can('create', \App\Models\Project::class)
                <li><a class="dropdown-item" href="{{ route('projects.create') }}">Create a New PAP</a></li>
                @endcan
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