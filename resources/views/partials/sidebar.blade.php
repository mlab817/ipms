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
