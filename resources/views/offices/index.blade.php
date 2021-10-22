@extends('layouts.app')

@section('page-header')
    <x-page-header header="Offices"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title overflow-hidden flex-auto">Offices
                <span class="Counter Counter--gray-dark">{{ count($offices) }}</span>
            </h3>
            <a href="{{ route('offices.create') }}" class="btn btn-primary btn-sm">New</a>
        </div>
        @if(count($offices))
        <div class="Box-body p-0">
            @foreach($offices as $office)
                <div class="Box-row clearfix position-relative pr-6">
                    <details class="details-reset details-overlay dropdown position-static">
                        <summary class="color-fg-muted position-absolute right-0 top-0 mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-6 mr-1 top-0" role="menu">
                            <a href="{{ route('offices.show', $office) }}" class="btn-link dropdown-item" role="menuitem">
                                View
                            </a>
                            <a href="{{ route('offices.edit', $office) }}" class="btn-link dropdown-item" role="menuitem">
                                Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('offices.destroy', $office) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button onclick="return confirm('Are you sure you want to delete this office?')" type="submit" class="btn-link dropdown-item" role="menuitem">
                                    Delete
                                </button>
                            </form>
                        </details-menu>
                    </details>

                    <div class="col-12 col-md-6 col-lg-4 pr-2 float-left">
                        <h4 class="mb-1">
                            <a href="{{ route('offices.show', $office) }}" class="Link mr-1">{{ $office->acronym }}</a>
                        </h4>
                        <p class="f5">{{ $office->email }}</p>
                        <p class="f6">{{ $office->contact_numbers }}</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-8 float-left markdown-body">
                        <p class="color-fg-muted">{{ $office->name }}</p>
                        <p class="f5">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-repo">
                                <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                            </svg> PAPs:
                            @foreach($office->projects->take(5) as $project)
                                <a href="{{ route('projects.show', $project) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $project->title }}">{{ $project->uuid }}</a>
                            @endforeach
                        </p>
                        <p class="f5">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-person">
                                <path fill-rule="evenodd" d="M10.5 5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zm.061 3.073a4 4 0 10-5.123 0 6.004 6.004 0 00-3.431 5.142.75.75 0 001.498.07 4.5 4.5 0 018.99 0 .75.75 0 101.498-.07 6.005 6.005 0 00-3.432-5.142z"></path>
                            </svg> Users:
                            @foreach($office->users as $user)
                                <a href="{{ route('users.show', $user) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $user->full_name }}">
                                    {{ $user->username }}
                                </a>
                            @endforeach
                        </p>
                        <p class="f5">
                            <svg class="octicon octicon-tasklist" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M2.5 2.75a.25.25 0 01.25-.25h10.5a.25.25 0 01.25.25v10.5a.25.25 0 01-.25.25H2.75a.25.25 0 01-.25-.25V2.75zM2.75 1A1.75 1.75 0 001 2.75v10.5c0 .966.784 1.75 1.75 1.75h10.5A1.75 1.75 0 0015 13.25V2.75A1.75 1.75 0 0013.25 1H2.75zm9.03 5.28a.75.75 0 00-1.06-1.06L6.75 9.19 5.28 7.72a.75.75 0 00-1.06 1.06l2 2a.75.75 0 001.06 0l4.5-4.5z"></path></svg> Reviewers:
                            @foreach($office->reviewers as $user)
                                <a href="{{ route('users.show', $user) }}" class="btn-link tooltipped tooltipped-n" aria-label="{{ $user->full_name }}">
                                    {{ $user->username }}
                                </a>
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="Box-footer">
            <div class="pagination text-center">
                {{ $offices->links() }}
            </div>
        </div>
        @else
            <x-blankslate title="Nothing to show"></x-blankslate>
        @endif
    </div>
@endsection