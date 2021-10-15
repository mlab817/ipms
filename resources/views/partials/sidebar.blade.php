<aside>
    <nav class="SideNav">
        <a class="SideNav-item" href="{{ route('dashboard') }}">
            Dashboard
        </a>
        <a class="SideNav-item" href="{{ route('projects.create') }}">
            Create a new PAP
        </a>
        <a class="SideNav-item" href="{{ route('projects.index') }}">
            View Projects
        </a>
        <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="javascript:void(0)" class="SideNav-item" onclick="confirmLogout()">
            Logout
        </a>
    </nav>
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
