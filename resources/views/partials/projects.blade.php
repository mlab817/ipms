
@if(count($projects))
    <ul class="border-top mt-3">
        @foreach($projects as $project)
        <li class="col-12 d-flex width-full py-4 border-bottom color-border-muted">
            <div class="col-10 col-lg-9 d-inline-block">
                <div class="d-inline-block mb-1">
                    <div class="d-inline wb-break-all">
                        <a href="{{ route('projects.show', $project) }}" class="Link--onHover">
                            <strong>{{ $project->title }}</strong>
                        </a>
                    </div>
                    <div class="d-inline">
                        <a href="{{ route('projects.index', array_merge(request()->except('status'), ['status' => $project->submission_status->name ])) }}" class="btn-link">
                            <span class="Label Label--secondary v-align-middle mr-1 mb-1">
                                {{ $project->submission_status->name }}
                            </span>
                        </a>
                    </div>
                    <div class="text-small color-fg-subtle">
                        <div class="Truncate" >
                        <span class="Truncate-text" style="max-width: 480px;">
                            {{ strip_tags($project->description->description) }}
                        </span>
                        </div>
                    </div>
                </div>

                <div>
                </div>

                <div class="f6 color-fg-muted mt-2">

                    <span class="ml-0 mr-3">
                        <span class="repo-language-color" style="background-color: @if($project->pap_type->name == 'Project') #e34c26 @else #2da44e @endif"></span>
                        <span itemprop="">
                            {{ $project->project_status->name }}
                            {{ optional($project->pap_type)->name }}
                        </span>
                    </span>

                    <a href="{{ route('offices.show', $project->office) }}" class="btn-link">
                        <span class="ml-0 mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="10" height="10"><path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path></svg>

                            <span itemprop="">
                                {{ optional($project->office)->acronym }}
                            </span>
                        </span>
                    </a>

                    by <a href="{{ route('users.show', $project->creator) }}" class="btn-link">
                        <span class="ml-0 mr-3">
                            <span itemprop="">
                                {{ optional($project->creator)->full_name }}
                            </span>
                        </span>
                    </a>

                    <svg class="octicon octicon-clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="12" height="12"><path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zm.5 4.75a.75.75 0 00-1.5 0v3.5a.75.75 0 00.471.696l2.5 1a.75.75 0 00.557-1.392L8.5 7.742V4.75z"></path></svg>

                    Updated {{ $project->updated_at->diffForHumans(null, null, true) }}
                </div>
            </div>

            <div class="col-2 col-lg-3 d-flex flex-column flex-justify-around">
                <div class="text-right">
                    <details class="details-reset details-overlay dropdown">
                        <summary class="color-fg-muted position-relative mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-4 mr-1 top-0" role="menu">
                            <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                View
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                Edit
                            </a>
                            <div role="none" class="dropdown-divider"></div>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete this PAP?')" type="submit" href="{{ route('projects.destroy', $project) }}" class="btn-link dropdown-item" role="menuitem">
                                    Delete
                                </button>
                            </form>
                        </details-menu>
                    </details>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

    <div class="paginate-container d-none d-sm-flex flex-sm-justify-center">
        {{ $projects->appends(request()->except('page'))->links() }}
    </div>
@else
    <div class="blankslate blankslate-large">
        <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
        <h3 class="mb-1">There are no programs or projects to show.</h3>
        @can('create', \App\Models\Project::class)
            @if(auth()->user()->office_id == $office->id ?? '')
                <p>Change your filters and search or add a new PAP to continue.</p>
                <a class="btn btn-primary my-3" href="{{ route('projects.create') }}" role="button">New</a>
            @endif
        @endcan
    </div>
@endif

@if(auth()->user()->role)
    <div class="protip mb-3">
        <div class="col-xl-6 col-lg-9 col-md-12 mx-auto">
            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-light-bulb color-text-secondary">
                <path fill-rule="evenodd" d="M8 1.5c-2.363 0-4 1.69-4 3.75 0 .984.424 1.625.984 2.304l.214.253c.223.264.47.556.673.848.284.411.537.896.621 1.49a.75.75 0 01-1.484.211c-.04-.282-.163-.547-.37-.847a8.695 8.695 0 00-.542-.68c-.084-.1-.173-.205-.268-.32C3.201 7.75 2.5 6.766 2.5 5.25 2.5 2.31 4.863 0 8 0s5.5 2.31 5.5 5.25c0 1.516-.701 2.5-1.328 3.259-.095.115-.184.22-.268.319-.207.245-.383.453-.541.681-.208.3-.33.565-.37.847a.75.75 0 01-1.485-.212c.084-.593.337-1.078.621-1.489.203-.292.45-.584.673-.848.075-.088.147-.173.213-.253.561-.679.985-1.32.985-2.304 0-2.06-1.637-3.75-4-3.75zM6 15.25a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zM5.75 12a.75.75 0 000 1.5h4.5a.75.75 0 000-1.5h-4.5z"></path>
            </svg>
            <strong>ProTip!</strong>
            {{ strtoupper(auth()->user()->role->name) . ': ' . \App\Models\Role::ROLE_DESCRIPTIONS[auth()->user()->role->name] }}
        </div>
    </div>
@endif