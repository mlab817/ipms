@extends('layouts.app')

@section('page-header')
    <header class="color-bg-subtle border-bottom-0 pt-0">

        <div class="container-lg pt-4 p-responsive clearfix">

            <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
                <div class="flex-1">
                    <h1 class="h1 lh-condensed">
                        Validate Programs and Projects
                    </h1>

                    <div class="color-fg-muted"><div></div></div>

                    <div class="d-md-flex flex-items-center mt-2">

                    </div>
                </div>

                <div class="flex-self-start mt-3">

                </div>

            </div>
        </div>

        <div class="position-relative mt-5">
            <nav class="UnderlineNav hx_UnderlineNav overflow-visible" aria-label="Office">
                <div class="width-full d-flex position-relative container-lg">
                    <ul class="list-style-none UnderlineNav-body width-full p-responsive overflow-hidden">
                        <li data-tab-item="org-header-projects-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('appraisal') }}" @if($tab == '') aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                                PAPs
                                <span title="Not available" class="Counter js-profile-project-count">
                                    {{ \App\Models\Project::notValidated()->count() }}
                                </span>
                            </a>
                        </li>

                        @foreach(\App\Models\RefValidationStatus::withCount('projects')->get() as $status)
                        <li data-tab-item="org-header-projects-tab" class="d-flex">
                            <a class="UnderlineNav-item " href="{{ route('appraisal', ['tab' => $status->name]) }}" @if($tab == $status->name) aria-current="page" @endif>
                                <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-project UnderlineNav-octicon">
                                    <path fill-rule="evenodd" d="M1.75 0A1.75 1.75 0 000 1.75v12.5C0 15.216.784 16 1.75 16h12.5A1.75 1.75 0 0016 14.25V1.75A1.75 1.75 0 0014.25 0H1.75zM1.5 1.75a.25.25 0 01.25-.25h12.5a.25.25 0 01.25.25v12.5a.25.25 0 01-.25.25H1.75a.25.25 0 01-.25-.25V1.75zM11.75 3a.75.75 0 00-.75.75v7.5a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75zm-8.25.75a.75.75 0 011.5 0v5.5a.75.75 0 01-1.5 0v-5.5zM8 3a.75.75 0 00-.75.75v3.5a.75.75 0 001.5 0v-3.5A.75.75 0 008 3z"></path>
                                </svg>
                                {{ $status->name }}
                                <span title="Not available" class="Counter js-profile-project-count">
                                    {{ $status->projects_count }}
                                </span>
                            </a>
                        </li>
                        @endforeach

                    </ul>

                </div>
            </nav>
        </div>

    </header>
@endsection

@section('content')
    <div class="container-lg">
        <ul>
            @foreach($projects as $project)
                <div class="Box-row p-0 mt-0">
                    <div class="d-flex Box-row--drag-hide position-relative">

                        <!-- Issue title column -->
                        <div class="flex-auto min-width-0 p-2 pr-3 pr-md-2">
                            <div class="d-flex">
                                <a href="{{ route('offices.show', $project->office) }}" class="Link--primary h4">
                                    [{{ $project->office->acronym }}]
                                </a>
                                &nbsp;-&nbsp;
                                <a class="Link--primary v-align-middle no-underline h4 markdown-title" href="{{ route('projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </div>

                            <div class="d-flex">
                                Submission Status:
                                <div>
                                    <span class="ml-2 flex-1 flex-shrink-0 Counter">
                                        {{ $project->submission_status->name }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex">
                                Issues:
                                <div>
                                    <span class="ml-2 flex-1 flex-shrink-0 Counter">
                                        {{ $project->issue->issues_count ?? 0 }}
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex">
                                Remarks:
                                <span class="ml-2 flex-1 flex-shrink-0">
                                    {{ $project->validation_remarks }}
                                </span>
                            </div>

                            <div class="d-flex">
                                <span class="flex-1 flex-shrink-0">
                                    {{ $project->no_further_inputs ? 'No further inputs' : '_' }}
                                </span>
                            </div>

                            <div class="d-flex mt-1 text-small color-fg-muted">
                                <span class="validated-by">
                                    Validated by
                                    <a class="Link--muted" title="">{{ $project->validator->username }}</a>
                                </span>

                                <span class="d-none d-md-inline-flex">

                                </span>

                            </div>

                            <div class="d-flex mt-1 text-small color-fg-muted">
                                <span class="reviewed-by">
                                    Last updated
                                    <a class="Link--muted" title="">
                                        {{ $project->updated_at->diffForHumans(null, null, true) }}
                                    </a>
                                </span>

                            </div>
                        </div>

                        <div class="flex-shrink-0 col-3 pt-2 text-right pr-3 no-wrap d-flex hide-sm ">

                          <span class="flex-1 flex-shrink-0">

                        </span>

                        <span class="flex-1 flex-shrink-0">
                            <div class="AvatarStack AvatarStack--right ml-2 flex-1 flex-shrink-0 ">
                                <div class="AvatarStack-body tooltipped tooltipped-sw tooltipped-multiline tooltipped-align-right-1 mt-1" aria-label="Assigned to ">
                                </div>
                            </div>
                        </span>

                        </div>
                    </div>
                </div>

            @endforeach
        </ul>
        <div class="Box-footer">
            <div class="pagination text-center">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection