@extends('layouts.app')

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h1 class="Box-title">Projects</h1>
        </div>
        <ul>
            @foreach($projects as $project)
            <li class="Box-row d-flex flex-items-center">
                <div class="flex-auto">
                    <strong>{{ $project->title }}</strong>
                    <div class="text-small color-fg-subtle">
                        <div class="Truncate" >
                            <span class="Truncate-text Truncate-text--expandable" style="max-width: 480px;">
                                {{ strip_tags($project->description->description) }}
                            </span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View</a>
            </li>
            @endforeach
        </ul>
    </div>

    <p class="note text-muted">
        <b>Note:</b> For Office projects, the user will be able to view projects added by their office which
        is based on which office the user is affiliated/assigned to when they added the project. For Own projects,
        the user will be able to view the projects they added.
    </p>
@endsection

@push('scripts')
    <script>
        function confirmDelete(slug) {
            let response = confirm('Are you sure you want to delete this project?')
            if (response) {
                // create a fake url using route helper
                let url = '{{ route("projects.destroy", ":id") }}'
                // replace id with the project slug
                url = url.replace(':id', slug);

                $.ajax({
                    url: url,
                    type: 'delete',
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        // prompt user of success
                        alert(data.message)
                        let oTable = $('.projects-table').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                })
            }
        }
    </script>
@endpush
