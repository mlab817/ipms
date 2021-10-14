@extends('layouts.admin')

@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New PAP</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        @can('projects.view_own')
                            <li class="breadcrumb-item"><a href="{{ route('projects.own') }}">Own Projects</a></li>
                        @endcan
                        <li class="breadcrumb-item active">Add New PAP</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="callout callout-info">
                        <h5>Instruction:</h5>

                        <p>PAP title must be unique.</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">{{ __("General Information") }}</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="ref_office_id" class="col-form-label col-sm-3 required">Office </label>
                                <div class="col-sm-9">
                                    <x-select name="office_id" :options="$offices" :selected="old('office_id')"></x-select>
                                    <x-error-message name="office_id"></x-error-message>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-form-label col-sm-3 required">PAP Title </label>
                                <div class="col-sm-9">
                                    <x-input.text name="title" value="{{ old('title') }}"></x-input.text>
                                    <x-error-message name="title"></x-error-message>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_pap_type_id" class="col-form-label col-sm-3 required">PAP Type </label>
                                <div class="col-sm-9">
                                    <x-select name="ref_pap_type_id" :options="$pap_types" :selected="old('ref_pap_type_id')"></x-select>
                                    <x-error-message name="ref_pap_type_id"></x-error-message>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="regular_program" class="col-form-label col-sm-3 required">Is this a regular
                                    program? </label>
                                <div class="col-sm-9">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="regular_program" value="1"
                                               @if(old('regular_program') == 1) checked @endif>
                                        <label class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="regular_program" value="0"
                                               @if(old('regular_program') == 0) checked @endif>
                                        <label class="form-check-label">No</label>
                                    </div>
                                    @error('regular_program')<span
                                            class="error invalid-feedback">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3 ml-1">
                        <button type="submit" class="btn btn-success">Create PAP</button>
                        <a href="{{ route('projects.own') }}" class="btn">Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"
            integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('input[name=title]').keyup($.debounce(500, function (e) {
            let title = e.target.value

            if (title && title.length >= 3) {
                // run search
                $.get("{{ route('search.index') }}",
                    {
                        _token: "{{ csrf_token() }}",
                        search: title
                    },
                    function (data, status) {
                        console.log(data)
                        console.log(status)
                        let target = $('#search-results')
                        if (data.length) {
                            target.empty()
                            target.append('<label class="text-muted">Found the following potential matches:</label>')
                            data.forEach(res => {
                                target.append(
                                    `<a href="${res.url}" target="_blank">${res.title}</a>`
                                )
                            })
                        } else {
                            target.empty()
                            target.append(
                                '<p>Nothing found.</p>'
                            )
                        }
                    }
                )
            } else {
                let target = $('#search-results')
                target.empty()
            }
        }))
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#expected_outputs' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#updates' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
