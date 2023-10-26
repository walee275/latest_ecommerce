@extends('layouts.admin')

@section('title')
    User Edit - Admin Panel
@endsection

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>
@endsection


@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">


            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Edit User - {{ $user->name }}</h4>
                                @include('partials.alerts')

                                <form action="{{ route('admin.user.update', $user) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="name">User Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="email">User Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter Email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password">
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation"
                                                name="password_confirmation" placeholder="Enter Password">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-sm-12">
                                            <label for="role">Assign Role</label>
                                            <select name="role" id="role" class="form-select">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}"
                                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                                        {{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
