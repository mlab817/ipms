@extends('layouts.app')

@section('content')
    <div class="Box">
        <div class="Box-header">
            <div class="Box-title">Create a new PAP</div>
        </div>
        <div class="Box-body">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf

                <dl class="form-group @error('office_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="office_id" class="required">Office </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="office_id" :options="$offices" :selected="old('office_id')" aria-describedby="office-validation"></x-select>
                        <x-error-message name="office_id" id="office-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('title') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="title" class="required">PAP Title </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.text name="title" value="{{ old('title') }}" aria-describedby="title-validation"></x-input.text>
                        <x-error-message name="title" id="title-validation"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('ref_pap_type_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="ref_pap_type_id" class="required">PAP Type </label>
                    </dt>
                    <div class="col-sm-9">
                        <x-select name="ref_pap_type_id" :options="$pap_types" :selected="old('ref_pap_type_id')" aria-describedby="pap-type-validation"></x-select>
                        <x-error-message name="ref_pap_type_id" id="pap-type-validation"></x-error-message>
                    </div>
                </dl>

                <div class="form-group row">
                    <label for="regular_program" class="col-form-label col-sm-3 required">Is this a regular
                        program? </label>
                    <div class="col-sm-9">
                        <div class="form-checkbox">
                            <input type="radio" name="regular_program" value="1"
                                   @if(old('regular_program') == 1) checked @endif>
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div class="form-checkbox">
                            <input type="radio" name="regular_program" value="0"
                                   @if(old('regular_program') == 0) checked @endif>
                            <label class="form-check-label">No</label>
                        </div>
                        @error('regular_program')<span
                                class="error invalid-feedback">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3 ml-1">
                        <button type="submit" class="btn btn-primary">Create PAP</button>
                        <a href="{{ route('projects.own') }}" class="btn">Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
