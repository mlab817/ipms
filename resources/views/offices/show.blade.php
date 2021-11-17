@extends('layouts.app')

@include('offices.offices-header', ['activeTab' => 'projects'])

@section('content')
    <div class="px-3">
        @include('partials.projects', ['projects' => $projects])
    </div>
@endsection