@section('page-header')
    <x-page-header :header="$project->title">
        <div class="position-relative width-full color-bg-subtle">
            <div class="width-full d-flex position-relative container-lg">
                <nav class="UnderlineNav" aria-label="Foo bar" x-data="{ tab: '{{ $tab }}' }">
                    <div class="UnderlineNav-body">
                        <a class="UnderlineNav-item" href="{{ route('projects.show', $project) }}" @if($tab == 'profile') aria-current="page" @endif style="cursor:pointer;">Profile</a>
                        <a class="UnderlineNav-item" href="{{ route('projects.history', $project) }}" @if($tab == 'history') aria-current="page" @endif style="cursor:pointer;">
                            History
                            <span class="Counter Counter--gray">{{ count($project->audit_logs) }}</span>
                        </a>
                        <a class="UnderlineNav-item" href="{{ route('projects.issues', $project) }}" @if($tab == 'issues') aria-current="page" @endif style="cursor:pointer;">
                            Issues
{{--                            <span class="Counter Counter--gray">{{ count(optional($project->issue)->issues ?? []) }}</span>--}}
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </x-page-header>
@endsection