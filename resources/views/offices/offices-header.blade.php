@section('page-header')
    <header class="color-bg-subtle border-bottom-0 pt-0">

        <div class="container-lg pt-4 p-responsive clearfix">

            <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
                <img
                        itemprop="image"
                        class="avatar flex-shrink-0 mb-3 mr-3 mb-md-0 mr-md-4"
                        src="{{ asset('images/offices/' . strtoupper($office->operating_unit->label) . '.png' ) }}" width="100" height="100" alt="{{ '@' . $office->acronym }}">

                <div class="flex-1">
                    <h1 class="h2 lh-condensed">
                        {{ $office->name }}
                    </h1>

                    <div class="color-fg-muted"><div></div></div>

                    <div class="d-md-flex flex-items-center mt-2">

                    </div>
                </div>

                <div class="flex-self-start mt-3">

                </div>

            </div>
        </div>

        <div class="position-relative">
            <nav class="UnderlineNav hx_UnderlineNav overflow-visible" aria-label="Office">
                <div class="width-full d-flex position-relative container-lg">
                    <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">
                        <li data-tab-item="org-header-projects-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('offices.show', $office) }}" data-hotkey="g b" @if($activeTab == 'projects') aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                                Projects
                                <span title="Not available" class="Counter js-profile-project-count">
                                    {{ $office->projects->count() }}
                                </span>
                            </a>
                        </li>

                        <li data-tab-item="org-header-people-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('offices.users', $office) }}" @if($activeTab == 'users') aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-person UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                                </svg>
                                Users
                                <span title="Not available" class="Counter">
                                    {{ $office->users->count() }}
                                </span>
                            </a>
                        </li>

                        @admin
                        <li data-tab-item="org-header-settings-tab" class="d-flex">
                            <a class="UnderlineNav-item" href="{{ route('offices.edit', $office) }}" @if($activeTab == 'edit') aria-current="page" @endif>
                                <svg class="octicon octicon-pencil UnderlineNav-octicon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M11.013 1.427a1.75 1.75 0 012.474 0l1.086 1.086a1.75 1.75 0 010 2.474l-8.61 8.61c-.21.21-.47.364-.756.445l-3.251.93a.75.75 0 01-.927-.928l.929-3.25a1.75 1.75 0 01.445-.758l8.61-8.61zm1.414 1.06a.25.25 0 00-.354 0L10.811 3.75l1.439 1.44 1.263-1.263a.25.25 0 000-.354l-1.086-1.086zM11.189 6.25L9.75 4.81l-6.286 6.287a.25.25 0 00-.064.108l-.558 1.953 1.953-.558a.249.249 0 00.108-.064l6.286-6.286z"></path></svg>
                                Edit
                            </a>
                        </li>
                        @endadmin

                    </ul>

                </div>
            </nav>
        </div>

    </header>
@endsection