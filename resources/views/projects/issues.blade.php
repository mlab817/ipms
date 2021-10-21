@extends('layouts.app')

@include('projects.partials.show-header')

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h2 class="Box-title">Issues: {{ $project->title }}
                <span class="Counter Counter--gray">
                    {{ count($issues) }}
                </span>
            </h2>
        </div>
        @forelse($issues as $key => $issue)
            <div class="Box-row d-flex flex-items-center">
                <div class="flex-auto">
                    <strong>{{ ucfirst($key) }}</strong>
                    <div class="text-small color-fg-subtle">
                        {{ $issue[0] }}
                    </div>
                </div>
            </div>
        @empty
            <x-blankslate title="Hooray!" message="No issues found or you have not edited this PAP yet. Pfft.">
                <a class="btn btn-primary my-3" role="button" href="{{ route('projects.edit', $project) }}">Start Editing</a>
            </x-blankslate>
        @endforelse
    </div>
@endsection