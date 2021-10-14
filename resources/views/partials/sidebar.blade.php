<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <div class="brand-image img-circle">
            <img src="{{ asset('images/logo-dark.png') }}" class="text-info" alt="AdminLTE Logo" width="35px">
        </div>
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar text-sm">
        <!-- Sidebar user panel (optional) -->
        @auth
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->full_name }}</a>
            </div>
        </div>
        @endauth

        <!-- SidebarSearch Form -->
        <form class="form-inline" action="{{ route('search.index') }}" method="GET">
            <div class="input-group">
                <input name="search" class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>

        <!-- Project Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if(Route::current()->getName() == 'dashboard') active @endif">
                        <!-- Heroicon: document-report -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @can('projects.create')
                    <div class="dropdown-divider"></div>

                    <li class="nav-item">
                        <a href="{{ route('projects.create') }}" class="nav-link @if(Route::current()->getName() == 'projects.create') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Create New PAP
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('projects.index') }}" class="nav-link @if(Route::current()->getName() == 'projects.index') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z" />
                            </svg>
                            <p>
                                View PAPs
                                <span class="badge badge-info right">{{ \App\Models\Project::own()->count() }}</span>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('projects.deleted') }}" class="nav-link @if(Route::current()->getName() == 'projects.deleted') active @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Deleted Projects
                                <span class="badge badge-info right">{{ \App\Models\Project::onlyTrashed()->count()  }}</span>
                            </p>
                        </a>
                    </li>
                @endcan

                <div class="dropdown-divider"></div>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(Route::current()->getName() == 'admin.users.index') active @endif">
                        <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        <p>
                            Manage Users
                            <span class="badge badge-info right">{{ \App\Models\User::count()  }}</span>
                        </p>
                    </a>
                </li>

                @auth
                    <div class="dropdown-divider"></div>

                    <li class="nav-item">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <a href="#" class="nav-link" role="button" onClick="confirmLogout()">
                            <!-- Heroicon: Logout icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="sidebar-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@push('scripts')
    <script type="text/javascript">
        /*
         * Function to confirm and handle logout
         */

        function confirmLogout() {
            let confirmLogout = confirm('Are you sure you want to logout?')

            if (confirmLogout) {
                let logoutForm = document.getElementById('logout')
                logoutForm.submit()
            }
        }
    </script>
@endpush
