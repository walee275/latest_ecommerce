@extends('layouts.admin')


@section('title')
    Role Create - Admin Panel
@endsection

@section('styles')
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
                                <h4 class="header-title">Create New Role</h4>
                                @include('partials.alerts')

                                <form action="{{ route('admin.roles.create') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Role Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter a Role Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Permissions</label>

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkPermissionAll"
                                                value="1">
                                            <label class="form-check-label" for="checkPermissionAll">All</label>
                                        </div>
                                        <hr>
                                        @php $i = 1; @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" onclick=""
                                                            name="permissions[]" id="checkPermission{{ $permission->id }}"
                                                            value="{{ $permission->name }}">
                                                        <label class="form-check-label"
                                                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                </div>

                                            </div>
                                            @php  $i++; @endphp
                                        @endforeach


                                    </div>


                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
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
    @include('admin.roles.partials.scripts')
@endsection
