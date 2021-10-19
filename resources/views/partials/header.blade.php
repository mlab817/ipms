<div class="Header">
    <div class="Header-item">
        <a href="{{ route('dashboard') }}" class="Header-link f4 d-flex flex-items-center">
            <!-- <%= octicon "mark-github", class: "mr-2", height: 32 %> -->
            <svg height="32" class="octicon octicon-mark-github mr-2" viewBox="0 0 16 16" version="1.1" width="32" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
            <span>{{ config('app.name', 'PIPS') }}</span>
        </a>
    </div>
    <div class="Header-item">
        <input type="search" class="form-control Header-input" />
    </div>
    <div class="Header-item Header-item--full">
        <a class="Header-link" href="{{ route('dashboard') }}">
            Dashboard
        </a>
        <a class="Header-link ml-2" href="{{ route('projects.index') }}">
            My PAPs
        </a>
    </div>
    <div class="Header-item mr-4">
        <span class="tooltipped tooltipped-sw" aria-label="Create a PAP">
            <a href="{{ route('projects.create') }}" class="Header-link" role="button" aria-label="Create a PAP">
                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-plus">
                    <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                </svg>
            </a>
        </span>
    </div>
    <div class="Header-item mr-0">
        <details class="dropdown details-reset details-overlay d-inline-block">
            <summary class="Header-link" role="button" aria-haspopup="menu">
                <img class="avatar" height="20" alt="@octocat" src="https://github.com/octocat.png" width="20">
                <span class="dropdown-caret"></span>
            </summary>
            <ul class="dropdown-menu dropdown-menu-sw mt-2">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('projects.create') }}">Create a PAP</a></li>
                <li><a class="dropdown-item" href="{{ route('projects.index') }}">My PAPs</a></li>

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