@extends('layouts.app')

@include('projects.partials.show-header')

@section('content')
    <div class="Box">
        <div class="Box-row--blue"></div>
        <div class="Box-header">
            <h2 class="Box-title">Issues
                <span class="Counter Counter--gray">
                    {{ count($issues) }}
                </span>
            </h2>
        </div>
        @forelse($issues as $key => $issue)
            <div class="Box-row d-flex flex-items-center">
                <div class="flex-auto">
                    <strong>{{ ucfirst(str_ireplace('id', ' ', str_replace('_', ' ', str_ireplace('ref_','',$key)))) }}</strong>
                    <div class="text-small color-fg-subtle">
                        {{ $issue[0] }}
                    </div>
                </div>
            </div>
        @empty
            <x-blankslate title="Hooray!" message="No issues found or you have not edited this PAP yet. Pfft.">
                @can('update', $project)
                    <a class="btn btn-primary my-3" role="button" href="{{ route('projects.edit', $project) }}">Start Editing</a>
                @endcan
            </x-blankslate>
        @endforelse
    </div>
@endsection