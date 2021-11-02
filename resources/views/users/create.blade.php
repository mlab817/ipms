@extends('layouts.app')

@section('page-header')
    <x-page-header header="Create a User"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h2 class="Box-title">Create a User</h2>
        </div>

        <form action="{{ route('users.store') }}" method="POST" accept-charset="utf-8">
            @csrf
            <div class="Box-body">
                <p class="note">Note: Username and password will be automatically generated.</p>

                <dl class="form-group @error('first_name') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="" class="required">First Name</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First name (e.g. Juan)" class="form-control">
                        <x-error-message name="first_name"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('last_name') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="last_name" class="required">Last Name</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last name (e.g. dela Cruz)" class="form-control">
                        <x-error-message name="last_name"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('email') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="email" class="required">Email</label>
                    </dt>
                    <dd class="form-group-body" x-data="{
                        email: '',
                        checkEmailAvailability() {
                            const email = this.email;
                            axios.post('{{ route('api.checkEmailAvailability') }}', {
                                email: email
                            }).then(res => {
                                console.log(res);
                            });
                        }
                    }">
                        <input value="{{ old('email') }}" x-on:input="checkEmailAvailability" type="email" name="email" id="email" placeholder="Email (e.g. juandelacruz@gmail.com)" class="form-control" x-model.debounce="email">
                        <x-error-message name="email"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('username') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="username" class="required">Username</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" name="username" id="username" placeholder="Username (e.g. juandelacruz)" class="form-control" value="{{ old('username') }}">
                        <x-error-message name="username"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('office_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="office_id" class="required">Office</label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="office_id" id="office_id" :options="$offices" :selected="old('office_id')"></x-select>
                        <x-error-message name="office_id"></x-error-message>
                    </dd>
                </dl>

                <dl class="form-group @error('role_id') errored mb-6 @enderror">
                    <dt class="form-group-header">
                        <label for="role_id" class="required">Role</label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="role_id" id="role_id" :options="$roles" :selected="old('role_id')"></x-select>
                        <x-error-message name="role_id"></x-error-message>
                    </dd>
                </dl>

                <div class="form-checkbox">
                    <label for="activate">
                        <input type="checkbox" name="activate" value="1" id="activate" checked>
                        Activate user upon creation
                        <p class="note">Will automatically activate user upon creation of account (i.e. user can immediately login)</p>
                    </label>
                </div>
            </div>
            <div class="Box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection