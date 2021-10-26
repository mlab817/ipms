@extends('layouts.app')

@section('page-header')
    <x-page-header header="Update a User"></x-page-header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title overflow-hidden flex-auto">Update User</h3>
            <details class="details-reset details-overlay details-overlay-dark">
                <summary class="btn btn-danger btn-sm">Delete User</summary>
                <details-dialog class="Box--overlay">
                    <form action="{{ route('users.destroy', $user) }}" method="POST" accept-charset="utf-8">
                        @csrf
                        @method('DELETE')
                        <div class="Box">
                            <div class="Box-header">
                                <h2 class="Box-title">Delete User</h2>
                            </div>
                            <div class="Box-body">
                                <p>This will deactivate user account. The user will not be able to login. Are you sure you want to continue?</p>
                            </div>
                            <div class="Box-footer">
                                <button type="submit" class="btn btn-danger">Delete User</button>
                            </div>
                        </div>
                    </form>
                </details-dialog>
            </details>
        </div>

        <form action="{{ route('users.update', $user) }}" method="POST" accept-charset="utf-8">
            @csrf
            @method('PUT')
            <div class="Box-body">
                <p class="note">Note: Email can no longer be changed.</p>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="" class="required">First Name</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="First name (e.g. Juan)" class="form-control">
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="last_name" class="required">Last Name</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Last name (e.g. dela Cruz)" class="form-control">
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="email" class="required">Email</label>
                    </dt>
                    <dd class="form-group-body">
                        <input type="email" name="email" id="email" placeholder="Email (e.g. juandelacruz@gmail.com)" class="form-control" value="{{ $user->email }}" disabled>
                    </dd>
                </dl>

                <dl class="form-group">
                    <dt class="form-group-header">
                        <label for="office_id" class="required">Office</label>
                    </dt>
                    <dd class="form-group-body">
                        <x-select name="office_id" id="office_id" :options="$offices" :selected="old('office_id', $user->office_id)"></x-select>
                    </dd>
                </dl>

                <div x-data="{
                    role_id: {{ old('role_id', $user->role_id) ?? 0 }},
                }">
                    <dl class="form-group">
                        <dt class="form-group-header">
                            <label for="office_id" class="required">Role</label>
                        </dt>
                        <dd class="form-group-body">
                            <x-select x-model="role_id" name="role_id" id="role_id" :options="$roles" :selected="old('role_id', $user->role_id)"></x-select>
                        </dd>
                    </dl>

                    <dl x-cloak x-show="parseInt(role_id) === 1">
                        <dt class="form-group-header">
                            <label for="office_id" class="required">Assigned Office</label>
                        </dt>
                        <dd class="form-group-body">
                            <filter-input aria-owns="offices">
                                <input type="search" class="form-control my-2" placeholder="Filter offices" autofocus autocomplete="off">
                            </filter-input>
                            <div id="offices">
                                <div data-filter-list>
                                @foreach($offices as $key => $office)
                                    <div class="form-checkbox m-0">
                                        <label for="office_{{ $key }}" data-filter-item-text>
                                            <input type="checkbox" name="offices[]" id="offices" value="{{ $office->id }}" @if(in_array($office->id, old('offices', $user->offices->pluck('id')->toArray() ?? []))) checked @endif>
                                            {{ $office->name }}
                                        </label>
                                    </div>
                                @endforeach
                                </div>
                                <div data-filter-empty-state hidden>0 offices found.</div>
                            </div>

                        </dd>
                    </dl>
                </div>
            </div>
            <div class="Box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection