@extends('layouts.app')

@section('page-header')
    <x-page-header header="Create a New PAP"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header">
            <div class="Box-title">Create a new PAP</div>
        </div>
        <form action="{{ route('projects.store') }}" method="POST" id="createProjectForm">
            @csrf
                <div class="Box-body">

                <dl class="form-group @error('office_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="office_id" class="required">Office </label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="hidden" name="office_id" value="{{ auth()->user()->office_id }}">
                        <x-select disabled name="office_id" :options="$offices" selected="{{ auth()->user()->office_id }}" aria-describedby="office-validation"></x-select>
                        <p class="note">Office depends on the current user's office assignment.</p>
                    </dd>
                </dl>

                <dl class="form-group @error('title') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="title" class="required">PAP Title </label>
                    </dt>
                    <dd class="form-group-body">
                        <x-input.text name="title" aria-describedby="title-validation" value="{{ old('title') }}"></x-input.text>
                        <x-error-message name="title" id="title-validation"></x-error-message>
                        <p class="note">PAP Title must be unique to avoid duplication.</p>
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

            </div>

            <div class="Box-footer">
                <button type="submit" class="btn btn-primary" id="submitAddForm">Create PAP</button>
                <a href="{{ route('projects.index') }}" class="btn">Back to List</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        const form = document.getElementById('createProjectForm');
        form.addEventListener('submit', function (evt) {
            // evt.preventDefault()
            console.log('submit')
            const submitButton = document.querySelector('#submitAddForm')
            console.log(submitButton)
            submitButton.innerHTML = 'Please wait...'
        })
    </script>
@endpush
