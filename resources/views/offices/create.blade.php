@extends('layouts.app')

@section('page-header')
    <x-page-header header="Create an Office"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h3 class="Box-title">Create an Office</h3>
        </div>

        <form action="{{ route('offices.store') }}" method="POST">
            @csrf
            <div class="Box-body">
                <dl class="form-group @error('name') errored mb-6 @enderror">
                    <dt>
                        <label for="name" class="required">Name</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control @error('name'){{ 'is-invalid' }}@enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name')<div class="note error">{{ $message }}</div>@enderror
                    </dd>
                </dl>

                <dl class="form-group @error('ref_operating_unit_id') errored mb-6 @enderror">
                    <dt>
                        <label for="ref_operating_unit_id" class="required">Operating Unit</label>
                    </dt>
                    <dd>
                        <x-select name="ref_operating_unit_id" :options="$operating_units" :selected="old('ref_operating_unit_id')"></x-select>
                        <x-error-message name="ref_operating_unit_id"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('acronym') errored mb-6 @enderror">
                    <dt>
                        <label for="acronym" class="required">Acronym</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control" name="acronym" id="acronym" placeholder="Acronym" value="{{ old('acronym') }}">
                        <x-error-message name="acronym"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('email') errored mb-6 @enderror">
                    <dt>
                        <label for="email" class="required">Email</label>
                    </dt>
                    <dd>
                        <input type="email" class="form-control @error('email'){{ 'is-invalid' }}@enderror" name="email" id="email" placeholder="Email (main email only)" value="{{ old('email') }}">
                        <x-error-message name="email"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('contact_numbers') errored mb-6 @enderror">
                    <dt>
                        <label for="contact_numbers" class="required">Contact Nos.</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control @error('contact_numbers'){{ 'is-invalid' }}@enderror" name="contact_numbers" id="contact_numbers" placeholder="Contact Nos." value="{{ old('contact_numbers') }}">
                        <x-error-message name="contact_numbers"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('office_head_name') errored mb-6 @enderror">
                    <dt>
                        <label for="office_head_name" class="required">Name of Office Head</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control" name="office_head_name" id="office_head_name" placeholder="Name of Office Head" value="{{ old('office_head_name') }}">
                        <x-error-message name="office_head_name"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('office_head_position') errored mb-6 @enderror">
                    <dt>
                        <label for="office_head_position" class="required">Position of Office Head</label>
                    </dt>
                    <dd>
                        <input type="text" class="form-control @error('office_head_position'){{ 'is-invalid' }}@enderror" name="office_head_position" id="office_head_position" placeholder="Position of Office Head" value="{{ old('office_head_position') }}">
                        <x-error-message name="office_head_position"></x-error-message>
                    </dd>
                </dl>
            </div>

            <div class="Box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn ml-2" href="{{ route('offices.index') }}">Back to List</a>
            </div>
        </form>
    </div>
@endsection